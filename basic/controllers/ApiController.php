<?php

namespace app\controllers;

class ApiController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = false;
        return $this->render('index');
    }

}
