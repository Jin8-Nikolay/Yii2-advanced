<?php

namespace common\components;

use Yii;
use common\models\Redirect;
use yii\helpers\Url;
use yii\base\BaseObject;

class RedirectComponent extends BaseObject
{
    public function init()
    {
        $pathUrl = '/' . Yii::$app->request->pathInfo;
        $domainUrl = Yii::$app->request->pathInfo . $pathUrl;
        foreach (Redirect::find()->all() as $redirect) {
            if (Url::isRelative($redirect->from)) {
                $compareUrl = $pathUrl;
                $sourceUrl = $redirect->from;
            } else {
                $compareUrl = $domainUrl;
                $sourceUrl = $redirect->from;
            }
            if ($sourceUrl === $compareUrl) {
                header('Location: ' . $redirect->to, true, $redirect->status);
                exit();
            }
        }
    }
}