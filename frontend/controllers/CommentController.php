<?php
namespace frontend\controllers;
use frontend\models\CommentForm;
use Yii;
use yii\web\Controller;
class CommentController extends Controller{


    public function actionAdd(){
        $model = new CommentForm();
        if ($model->load(Yii::$app->request->post()) && $model->create()){
            Yii::$app->session->setFlash('success', Yii::t('frontend', 'Спасибо'));
            return $this->redirect(Yii::$app->request->referrer);
        }
    }
}
?>