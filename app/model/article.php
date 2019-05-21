<?php

namespace app\model;
use core\lib\model;

/**
 * Created by PhpStorm.
 * User: tang
 * Date: 2019-05-21
 * Time: 17:50
 */
class article
{
    public static function getArticleList()
    {
        $model = new model();
        $sql = "select * from article";
        $PDOStatement = $model->query($sql);
        return $PDOStatement->fetchAll();
    }
}