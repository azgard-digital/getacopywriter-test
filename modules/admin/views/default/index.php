<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin';
?>
<div class="admin-default-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row content">
        <div class="col-sm-12 sidenav">
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'name',
                    [
                        'attribute' => 'authors',
                        'value' => function($model) {
                            return join(", ", array_map(function ($item){
                                return $item->name;
                            },$model->authors));
                        }
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{book-edit}{book-delete}',
                        'header' => 'Actions',
                        'buttons' => [
                            'book-edit' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, [
                                    'title' => Yii::t('app', 'Edit'),
                                ]);
                            },
                            'book-delete' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'title' => Yii::t('app', 'Delete'),
                                    'data-confirm' => Yii::t('yii', 'Are you sure to delete this item?'),
                                    'data-method' => 'post',
                                ]);
                            },

                        ]
                    ]
                ],
            ]);
            ?>
        </div>
    </div>
</div>
