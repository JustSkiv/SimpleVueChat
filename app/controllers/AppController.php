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

    /**
     * AppController constructor.
     */
    public function __construct($route)
    {
        parent::__construct($route);

//        new Main();
//        $this->menu = [
//            'asd' => 'ttt'
//        ];
    }
}