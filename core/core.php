<?php
/**
 * Created by PhpStorm.
 * User: tang
 * Date: 2019-05-21
 * Time: 13:48
 */

namespace core;

use core\lib\route;

class core
{
    public static $classMap = [];
    public $assigns = [];

    public static function run()
    {
        $route = new route();

        $ctrl = $route->ctrl;
        $action = $route->action;

        $ctrl_file = APP . '/controller/' . $ctrl . 'Ctrl.php';
        $cltrl_class = '\\' . MODULE . '\controller\\' . $ctrl . 'Ctrl';


        if (is_file($ctrl_file)) {
            include $ctrl_file;
            $ctrl = new $cltrl_class;
            $ctrl->$action();
        } else {
            throw new \Exception('找不到控制器:' . $cltrl_class);
        }

    }

    /**
     * 加载类
     *
     * @param $class
     * @return bool
     */
    static public function load($class)
    {
        if (isset($classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = PATH . '/' . $class . '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($key, $value)
    {
        $this->assigns[$key] = $value;
    }

    public function display($html)
    {
        $view_path = APP . '/views/' . $html . '.html';
        if (is_file($view_path)) {
            extract($this->assigns);
            include $view_path;
        } else {
            throw new \Exception('找不到视图:' . $view_path);

        }
    }
}