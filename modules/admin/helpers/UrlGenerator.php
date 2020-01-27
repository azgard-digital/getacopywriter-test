<?php
namespace app\modules\admin\helpers;

use Yii;

abstract class UrlGenerator
{
    public static function getHomeAdmin()
    {
        return Yii::$app->getRequest()->getBaseUrl() . '/admin';
    }

    public static function getHomeAdminShort()
    {
        return '/admin';
    }

    public static function getLoginAdminShort()
    {
        return '/admin/default/login';
    }

    public static function getLogoutAdminShort()
    {
        return '/admin/default/logout';
    }
}