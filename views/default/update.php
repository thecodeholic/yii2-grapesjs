<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $grapesJsVariables array */
/* @var $model thecodeholic\yii2grapesjs\models\Content */

$this->title = 'Update Content: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'grapesJsVariables' => $grapesJsVariables
    ]) ?>

</div>
