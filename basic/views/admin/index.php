<?php

use app\models\Song;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use function PHPUnit\Framework\lessThan;

/** @var yii\web\View $this */
/** @var app\models\SongSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="track">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    'artist',
                    'timeline',
                    'album',
                    //'filephoto',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Song $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
</div>