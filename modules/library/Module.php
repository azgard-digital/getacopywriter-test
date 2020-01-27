<?php

namespace app\modules\library;

use Yii;
use app\interfaces\ILibraryResource;
/**
 * library module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\library\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        Yii::$container->setSingleton('library', function () {
            return Yii::createObject('\app\modules\library\model\Resource');
        });
    }

    public function getResourceFactory():ILibraryResource
    {
        return Yii::$container->get('library');
    }
}
