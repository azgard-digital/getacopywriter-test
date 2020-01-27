<?php

namespace app\modules\api\modules\v1\controllers\actions;

use yii\rest\Action;
use Yii;

class UpdateBookAction extends Action
{
    public function init()
    {
    }

    public function run($id)
    {
        $data = Yii::$app->getRequest()->getBodyParams();
        return Yii::$app->getModule('library')->getResourceFactory()->updateBook($id, $data);
    }
}