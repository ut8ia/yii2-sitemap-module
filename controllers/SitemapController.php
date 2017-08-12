<?php

namespace ut8ia\sitemapmodule\controllers;

use yii\web\Controller;
use Yii;

class SitemapController extends Controller
{

    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     * @return string
     */
    public function actionXml()
    {
        $this->layout = false;
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'text/xml');
        $rows = '';
        foreach ($this->module->rows as $row) {
            $rows .= $this->render('xmlRow', ['row' => $row]);
        }
        return $this->render('xmlFile', ['rows' => $rows]);
    }

}
