<?php

namespace vprivaloff\exchanger\controllers;

use Yii;
use yii\web\Controller;
use vprivaloff\exchanger\models\Exchanger;

class ExchangerController extends Controller
{
    public $layout = 'main';
    public function actionIndex()
    {
        // регистрируем ресурсы:
        \vprivaloff\exchanger\ExchangerAssetsBundle::register($this->view);
        $datas = Exchanger::find()->all();
        return $this->render('index',[
            'datas' => $datas
        ]);
    }
}