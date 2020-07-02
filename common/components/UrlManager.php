<?php
namespace common\components;
use Yii;
use common\models\Language;
use yii\helpers\BaseUrl;
use codemix\localeurls\UrlManager as BaseUrlManager;
class UrlManager extends BaseUrlManager
{
    public $items = [];
    public function init(){
        $languages = Language::find()->where(['status' => true])->orderBy('pos')->all();
        if (count($languages)<=1){
            return false;
        }
        foreach ($languages as $language){
            $this->items[] = $language->code;
        }
        $this->languages = $this->items;
        parent::init();
    }
}
?>