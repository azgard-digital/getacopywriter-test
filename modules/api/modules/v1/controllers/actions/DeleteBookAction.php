<?php

namespace app\modules\api\modules\v1\controllers\actions;

use yii\rest\Action;
use Yii;

class DeleteBookAction extends Action
{
    public function init()
    {
    }

    public function run($id)
    {
        return Yii::$app->getModule('library')->getResourceFactory()->deleteBook($id);
    }
}