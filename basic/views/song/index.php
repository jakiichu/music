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
<p class="display lead">Карточка Артиста</p>
<style>
</style>
<div class="track">
    <h1 class="display" style="color:white; text-align:center">{{cartname}}</h1>
    <table class="table">
        <tbody style="color: #fff;">
            <?php foreach ($dataProvider->getModels() as $model) { ?>
            <?php $i =+ 1 ?>
                <tr>
                    <td class="text-center">
                        <svg id="start<?= $model->id ?>" v-on:click="say('<?php print($model->filephoto) ?>'), seenHide(<?= $model->id ?>)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                            <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                        </svg>
                        <svg class="pause" id="pause<?= $model->id ?>" v-on:click="say('<?php print($model->filephoto) ?>'), HideSeen(<?= $model->id ?>)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16" style="display: none">
                            <path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z" />
                        </svg>
                    </td>

                    <td style="cursor: pointer;" id="name<?php print_r($i)  ?>" value="<?= $model->artist ?>"><?= $model->artist ?></td>
                    <td> <?= $model->name ?></td>
                    <td class="td-actions text-right">
                        <?= $model->timeline ?>
                    </td>
                </tr>


            <?php } ?>
        </tbody>
    </table>
    <audio autoplay style="position: absolute;left:0;bottom: 5px;" v-bind:src="'track/' + message + '.mp3'" class="container-fluid track" controls type="audio/mp3"></audio>
</div>