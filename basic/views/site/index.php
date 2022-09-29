<?php

use yii\bootstrap5\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Track $model */

\yii\web\YiiAsset::register($this);
?>
<div id="search" style="float:right;" id="app-6">
    <div class="row" style="margin: 1em;">
        <input class="col" style="width: 20em; margin-right:1em" class="form-control" v-model="search">
        <a class="btn btn-success btn-sm col col-lg-2" v-bind:href="'/song?SongSearch%5Bid%5D=&SongSearch%5Bname%5D=&SongSearch%5Bartist%5D=' + search + '&SongSearch%5Btimeline%5D=&SongSearch%5Balbum%5D='">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
        </a>
    </div>

</div>
<div class="track-view">
    <table class="table">
        <tbody style="color: #fff;">

                <tr v-for="track in tracks">
                    <td class="text-center" >
                        <svg v-bind:id="'start'+track.id" v-on:click="say(track.filephoto), seenHide(track.id)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                            <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                        </svg>
                        <svg class="pause" v-bind:id="'pause'+track.id" v-on:click="say(track.filephoto), HideSeen(track.id)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16" style="display: none">
                            <path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z" />
                        </svg>
                    </td>
                    <td><a style="cursor: pointer;" v-on:click="search(track.id)" v-bind:link="asd">{{track.artist}}</a></td>
                    <td> {{track.name}}</td>
                    <td class="td-actions text-right">
                        {{track.timeline}}
                    </td>
                </tr>
        </tbody>
    </table>
    <audio autoplay style="position: absolute;left:0;bottom: 5px;" v-bind:src="'track/' + message + '.mp3'" class="container-fluid track" controls type="audio/mp3">
    </audio>
</div>
<script>
    var search = new Vue({
        el: "#search",
        data: {

            search: '',
            tracks: [],
        },
        mounted: async function() {
            const t = this
            await fetch('http://localhost:8080/api/index', {
                method: 'GET',
            }).then(async response => {
                t.tracks = await response.json()
            })
        }
    })
</script>