<?php

namespace app\modules\admin;

use app\modules\admin\helpers\UrlGenerator;
use Yii;
/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public $layout = 'main_admin';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        Yii::$app->user->loginUrl = [UrlGenerator::getLoginAdminShort()];
    }
}
