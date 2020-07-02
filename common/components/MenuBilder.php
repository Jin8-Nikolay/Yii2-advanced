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
        if (!isset($params['menuClass'])){
            $params['menuClass'] = '';
        }
        if (!isset($params['menuItemClass'])){
            $params['menuItemClass'] = '';
        }
        if (!isset($params['menuChildrenClass'])){
            $params['menuChildrenClass'] = '';
        }
        if (!isset($params['menuChildrenItemClass'])){
            $params['menuChildrenItemClass'] = '';
        }
        $menuItems = json_decode($items, true);
        $html = '<ul class="'.$params['menuClass'].'">';
        if (is_array($menuItems)) {
            foreach ($menuItems as $item) {
                $html.='<li class="'.$params['menuClass'].'">';
                $html.='<a href="'.$item['customSelect'].'">'.$item['title'].'</a>';
                if (isset($item['children'])) {
                    $html.='<ul class="'.$params['menuClass'].'">';
                    foreach ($item['children'] as $children) {
                        $html.='<li class="'.$params['menuClass'].'">';
                        $html.='<a href="'.$children['customSelect'].'">'.$children['title'].'</a>';
                        $html.='</li>';
                    }
                    $html.='</ul>';
                }
                $html.='</li>';
            }
        }
        $html .= '</ul>';
        return $html;
    }

}