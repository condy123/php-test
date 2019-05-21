<?php
/**
 * Created by PhpStorm.
 * User: tang
 * Date: 2019-05-21
 * Time: 16:41
 */

namespace core\lib;

class model extends \PDO
{
    public function __construct()
    {
        $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=ad';
        $username = 'root';
        $passwd = 12345678;
        $options = [
            'charset' => 'utf8'
        ];
        try {
            parent::__construct($dsn, $username, $passwd, $options);
        } catch (\PDOException $e) {
            print_r($e->getMessage());
        }

    }
}