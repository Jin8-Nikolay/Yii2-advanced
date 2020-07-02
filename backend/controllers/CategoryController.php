<?php

namespace backend\controllers;

use Yii;
use common\models\Category;
use common\models\CategorySearch;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class CategoryController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                        'denyCallback' => function ($rule, $action) {
                            return $this->redirect(Url::toRoute(['/site/login']));
                        }
                    ],
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $user = Yii::$app->user->getIdentity();
                            return $user->isAdmin() || $user->isManager();
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {

        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {

        $model = new Category();

        if ($model->load(Yii::$app->request->post())) {
            foreach (Yii::$app->request->post('CategoryTranslate', []) as $language => $data) {
                foreach ($data as $attribute => $translation){
                    $model->translate($language)->$attribute = $translation;
                }
            }
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            foreach (Yii::$app->request->post('CategoryTranslate', []) as $language => $data) {
                foreach ($data as $attribute => $translation){
                    $model->translate($language)->$attribute = $translation;
                }
            }
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionCheckbox()
    {

        $action = Yii::$app->request->post('action');
        $selection = (array)Yii::$app->request->post('selection');
        switch ($action) {
            case 'noactive':
                foreach ($selection as $id) {
                    $model = $this->findModel($id);
                    $model->status = 0;
                    $model->save(false);
                }
                break;
            case 'inactive':
                foreach ($selection as $id) {
                    $model = $this->findModel($id);
                    $model->status = 1;
                    $model->save(false);
                }
                break;
            case 'delete':
                foreach ($selection as $id) {
                    $this->findModel($id)->delete();
                }
                break;
        }
        return $this->redirect(['index']);
    }

    public function actionDelete($id)
    {

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
    }
}
