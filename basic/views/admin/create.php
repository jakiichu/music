<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Song $model */

$this->title = 'Create Song';
$this->params['breadcrumbs'][] = ['label' => 'Songs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="song-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
