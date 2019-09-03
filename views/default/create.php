<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $grapesJsVariables array */
/* @var $model thecodeholic\yii2grapesjs\models\Content */

$this->title = 'Create Content';
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'grapesJsVariables' => $grapesJsVariables
    ]) ?>

</div>
