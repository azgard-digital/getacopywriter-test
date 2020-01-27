<?php

namespace app\modules\api;

/**
 * api module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\api\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        $this->modules = [
            'v1' => [
                // you should consider using a shorter namespace here!
                'class' => 'app\modules\api\modules\v1\Module',
            ],
        ];
    }
}
