<?php

namespace app\modules\api\modules\v1\controllers\actions;

use yii\rest\Action;
use Yii;

class GetBookAction extends Action
{
    public function init()
    {
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function run($id)
    {
        return Yii::$app->getModule('library')->getResourceFactory()->getBook($id);
    }
}