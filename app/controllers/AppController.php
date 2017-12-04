<?php
/**
 * Created by Nikolay Tuzov
 */

namespace app\controllers;


use app\models\Main;
use vendor\core\base\BaseController;

class AppController extends BaseController
{
    public $menu;
    public $meta = [];

    public $localConfig;

    /**
     * AppController constructor.
     */
    public function __construct($route)
    {
        parent::__construct($route);

        $this->localConfig = require_once '../config/local.php';

//        new Main();
//        $this->menu = [
//            'asd' => 'ttt'
//        ];
    }

    /**
     * Перенаправляем запрос по указанному адресу
     * @param $url
     */
    public function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}