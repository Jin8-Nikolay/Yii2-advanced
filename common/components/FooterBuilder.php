<?php

namespace common\components;

use common\models\Menu;

class FooterBuilder
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
        if (!isset($params['div'])) {
            $params['div'] = '';
        }
        if (!isset($params['div_div'])) {
            $params['div_div'] = '';
        }
        if (!isset($params['div_div_div'])) {
            $params['div_div_div'] = '';
        }
        if (!isset($params['menu_UL_Class'])) {
            $params['menu_UL_Class'] = '';
        }
        if (!isset($params['menu_LI_Class'])) {
            $params['menu_LI_Class'] = '';
        }
        $menuItems = json_decode($items, true);
        $html = '<div class="' . $params['div'] . '">';
        if (is_array($menuItems)) {
            foreach ($menuItems as $item) {
                $html .= '<div class="' . $params['div_div'] . '">';
                $html .= '<div class="'.$params['div_div_div'].'">';
                $html .= '<h3>'.$item['title'].'</h3>';
                if (isset($item['children'])) {
                    foreach ($item['children'] as $children) {

                        $html .= '<ul>';
                        $html .= '<li>'.'<a href="'.$children['customSelect'].'">'.$children['title'].'</a>'.'</li>';
                        $html .= '</ul>';

                    }
                }
                $html .= '</div>';
                $html .= '</div>';
            }
        }
        $html .= '</div>';
        return $html;
    }



}