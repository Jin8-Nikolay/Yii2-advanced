<?php
namespace frontend\widgets;

use yii\base\Widget;
use common\models\Language;
use yii\db\Connection;
use yii\helpers\Html;
use yii\helpers\Url;

class LanguageSwitch extends Widget
{
    public $items;

    public function run()
    {
        $languages = Language::find()->where(['status' => true])->orderBy('pos ASC')->all();
        if (count($languages) <= 1) {
            return false;
        }
        foreach ($languages as $language) {
            $this->items[] = Html::a($language->code, Url::current(['language' => $language->code]), ['class' => 'btn btn-icon-toggle menubar-toggle']);
        }
        return implode('', $this->items);
    }
}

?>
