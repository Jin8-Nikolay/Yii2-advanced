<?php

namespace common\components;

use common\models\Menu;
use Yii;

class MenuCategoryBuilder
{
    public static function show($key, $params = [])
    {
        $menu = (new self())->findMenu($key);
        if ($menu) {
            return self::build($menu->content, $params);
        }
    }

    protected function findMenu($key)
    {
        return Menu::findOne(['key' => $key]);
    }

    public static function build($items, $params)
    {
        $menuItems = json_decode($items, true);
        $html = '<li class="dropdown le-dropdown">';
        $html .= '<a class="dropdown-toggle" data-toggle="dropdown">';
        $html .= '<i class="fa fa-list" data-toggle="dropdown">';
        $html .= '</i>';
        $html .= Yii::t('frontend', 'Выберите категорию');
        $html .= '</a>';
        $html .= '<ul class="dropdown-menu">';
        if (is_array($menuItems)) {
            foreach ($menuItems as $item) {
                $html .= '<li>';

                $html .= '<a href="'.$item['customSelect'].'">';
                $html .= $item['title'];
                $html .= '</a>';
                $html .= '</li>';
            }
        }
        $html .= '</ul>';
        $html .= '</li>';
        return $html;
    }

}