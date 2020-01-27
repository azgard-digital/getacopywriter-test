<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\form\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use app\modules\admin\helpers\UrlGenerator;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['login', 'logout', 'index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'index', 'book-delete', 'book-edit'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                    'book-delete' => ['post'],
                ],
            ],
        ]);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $provider = Yii::$app->getModule('library')->getResourceFactory()->loadBooks();
        return $this->render('index', ['dataProvider' => $provider]);
    }

    public function actionBookDelete($id)
    {
       $result = Yii::$app->getModule('library')->getResourceFactory()->deleteBook($id);

       if ($result) {
           Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Success'));
       } else {
           Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Error'));
       }

        return $this->goHome();
    }

    public function actionBookEdit($id)
    {
        /**
         * @var \app\modules\library\model\Book $model
         */
        $model = Yii::$app->getModule('library')->getResourceFactory()->getBookModel($id);

        if (!$model) {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->load($post) && $model->save()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Success'));
            }
        }

        return $this->render('edit-book', ['model' => $model]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function goHome()
    {
        return Yii::$app->getResponse()->redirect(UrlGenerator::getHomeAdmin());
    }
}
