<?php

namespace app\modules\api\modules\v1\controllers\actions;

use yii\rest\Action;
use Yii;

class ListBookAction extends Action
{
    public function init()
    {
    }

    public function run()
    {
        return Yii::$app->getModule('library')->getResourceFactory()->loadAllBooks();
    }
}