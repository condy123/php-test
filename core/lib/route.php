<?php
/**
 * Created by PhpStorm.
 * User: tang
 * Date: 2019-05-21
 * Time: 14:03
 */

namespace core\lib;

class route
{
    public $ctrl = 'Index';
    public $action = 'index';

    public function __construct()
    {
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
            $path = $_SERVER['REQUEST_URI'];
            $path_arr = explode('/', trim($path, '/'));
            if (isset($path_arr[0])) {
                $this->ctrl = $path_arr[0];
                unset($path_arr[0]);
            }
            if (isset($path_arr[1])) {
                $this->action = $path_arr[1];
                unset($path_arr[1]);
            }
            $count = count($path_arr) + 2;
            $i = 2;
            while ($i < $count) {
                if (isset($path_arr[$i + 1])) {
                    $_GET[$path_arr[$i]] = $path_arr[$i + 1];
                }
                $i = $i + 2;
            }
        }
    }
}