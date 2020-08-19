<?php

namespace common\components;

use common\models\Menu;

class MenuBuilder
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
        if (!isset($params['ul'])) {
            $params['ul'] = '';
        }
        if (!isset($params['ul_li'])) {
            $params['ul_li'] = '';
        }
        if (!isset($params['ul_li_a'])) {
            $params['ul_li_a'] = '';
        }
        if (!isset($params['ul_li_a_ul'])) {
            $params['ul_li_a_ul'] = '';
        }
        if (!isset($params['ul_li_a_ul_li'])) {
            $params['ul_li_a_ul_li'] = '';
        }
        if (!isset($params['ul_li_a_ul_li_div'])) {
            $params['ul_li_a_ul_li_div'] = '';
        }
        if (!isset($params['ul_li_a_ul_li_div_div'])) {
            $params['ul_li_a_ul_li_div_div'] = '';
        }
        if (!isset($params['ul_li_a_ul_li_div_div_ul'])) {
            $params['ul_li_a_ul_li_div_div_ul'] = '';
        }
        $menuItems = json_decode($items, true);
        $html = '<ul class="' . $params['ul'] . '">';
        if (is_array($menuItems)) {
            foreach ($menuItems as $item) {
                $html .= '<li class="' . $params['ul_li'] . '">';
                $html .= '<a href="' . $item['customSelect'] . '" class="' . $params["ul_li_a"] . '" data-toggle="dropdown">' . $item['title'] . '</a>';
                $html .= '<ul class="' . $params['ul_li_a_ul'] . '">';
                $html .= '<li class="' . $params['ul_li_a_ul_li'] . '">';
                $html .= '<div class="'.$params['ul_li_a_ul_li_div'].'">';
                $html .= '<div class="'.$params['ul_li_a_ul_li_div_div'].'">';
                $html .= '<ul>';
                if (isset($item['children'])) {
                    foreach ($item['children'] as $children) {
                        $html .= '<li>';
                        $html .= '<a href="' . $children['customSelect'] . '">' . $children['title'] . '</a>';
                        $html .= '</li>';
                    }
                }
                $html .= '</ul>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</li>';
                $html .= '</ul>';
            }
        }
        $html .= '</li>';
        $html .= '</ul>';
        return $html;
    }

}