<?php

use app\models\Song;
use yii\debug\models\timeline\Search;
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
            <tr v-for="track in tracks" v-if="track.artist == cartname">

                <td class="text-center">
                    <svg v-bind:id="'start'+track.id" v-on:click="say(track.filephoto), seenHide(track.id)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                    </svg>
                    <svg class="pause" v-bind:id="'pause'+track.id" v-on:click="say(track.filephoto), HideSeen(track.id)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16" style="display: none">
                        <path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z" />
                    </svg>
                </td>
                    <td style="cursor: pointer;" v-bind:id="'name'+track.id">{{track.artist}}</td>
                
                <td>{{track.name}}</td>
                <td class="td-actions text-right">
                    {{track.timeline}}
                </td>
            </tr>





        </tbody>
    </table>
    <audio autoplay style="position: absolute;left:0;bottom: 5px;" v-bind:src="'track/' + message + '.mp3'" class="container-fluid track" controls type="audio/mp3"></audio>
</div>

<script>
    var player2 = new Vue({
        el: ".track",
        data: {
            cartname: [],
            material: '',
            message: '',
            seen: true,
            start: 'start',
            start1: 'start',
            pause: 'pause',
            pause1: 'pause',
            asd: '',
            tracks: [],
            check: ''
        },
        methods: {
            seenHide: function(id) {
                this.seen = !this.seen
                this.start1 = this.start + id
                document.getElementById(this.start1).setAttribute('style', 'display: none');
                if (document.getElementById(this.start1).hasAttribute('style')) {
                    this.asd = document.getElementById(this.start1).getAttribute('style');
                    if (this.asd == 'display: none') {
                        this.pause1 = this.pause + id
                        document.getElementById(this.pause1).setAttribute('style', 'dispalay:block');
                    }
                }

            },
            HideSeen: function(id) {

                document.getElementById(this.pause1).setAttribute('style', 'display: none');
                if (document.getElementById(this.pause1).hasAttribute('style')) {
                    this.asd = document.getElementById(this.pause1).getAttribute('style');
                    if (this.asd == 'display: none') {
                        this.start1 = this.start + id
                        document.getElementById(this.start1).setAttribute('style', 'dispalay:block');
                        document.body.getElementsByTagName("audio").style['-webkit-media-controls-play-button'].click();


                    }
                }

            },
            say: function(message) {
                this.message = message
            },


        },
        beforeCreate: async function() {
            const t = this
            await fetch('http://localhost:8080/api/index', {
                method: 'GET',
            }).then(async response => {
                t.tracks = await response.json()
            })
        },
        updated: function() {

            this.cartname = this.tracks[<?php print($id)?> - 1].artist
            console.log(this.cartname)
        }
    })
</script>