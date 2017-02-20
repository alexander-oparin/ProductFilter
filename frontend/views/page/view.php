<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= $model->search_link ?></p>

    <textarea cols="100" rows="10"><?= $model->text ?></textarea>

    <div class="clearfix"></div>

    <textarea cols="100" rows="10"><?= $model->bottom_text ?></textarea>
</div>