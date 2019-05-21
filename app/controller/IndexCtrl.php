<?php

/**
 * Created by PhpStorm.
 * User: tang
 * Date: 2019-05-21
 * Time: 15:02
 */

namespace app\controller;

use app\model\article;
use core\core;

class IndexCtrl extends core
{
    public function index()
    {

        $this->assign("test", '123123');
        $this->display('index/index');
    }

    public function list()
    {
        $articleList = Article::getArticleList();
        print_r($articleList);
    }
}