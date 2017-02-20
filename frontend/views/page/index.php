<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Страницы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'name',
                'value' => function ($model, $key, $index, $column) {
                    return Html::a(
                        $model->{$column->attribute},
                        '/page/' . $model->id
                    );
                },
                'format' => 'raw'
            ],
        ],
        'summary' => '',
    ]); ?>
</div>
