<?php

namespace app\modules\api\modules\v1\controllers;

use Yii;
use yii\filters\ContentNegotiator;
use yii\rest\Controller;
use yii\web\Response;
use app\modules\api\modules\v1\controllers\actions\{
    ListBookAction,
    GetBookAction,
    DeleteBookAction,
    UpdateBookAction
};
class BooksController extends Controller
{

    public function actions()
    {
        return array_merge(parent::actions(), [
            'list' => [
                'class' => ListBookAction::class,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'by-id' => [
                'class' => GetBookAction::class,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'index' => [
                'class' => DeleteBookAction::class,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'update' => [
                'class' => UpdateBookAction::class,
                'checkAccess' => [$this, 'checkAccess'],
            ],
        ]);
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ]
        ]);
    }


    public function verbs()
    {
        return array_merge(parent::actions(),[
            'list' => ['GET'],
            'by-id' => ['GET'],
            'index' => ['DELETE'],
            'update' => ['POST']
        ]);
    }
}
