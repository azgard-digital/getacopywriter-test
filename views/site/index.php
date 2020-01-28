<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Test';

use yii\grid\GridView;
?>
<div class="site-index">

    <div class="body-content">

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
                        ]
                    ],
                ]);
                ?>
            </div>
        </div>

    </div>
</div>
