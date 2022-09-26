<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "song".
 *
 * @property int $id
 * @property string $name
 * @property string $artist
 * @property string $timeline
 * @property string $album
 * @property string $filephoto
 */
class Song extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'song';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'artist', 'timeline', 'album'], 'required'],
            [['timeline'], 'safe'],
            [['name', 'artist', 'filephoto'], 'string', 'max' => 255],
            [['album'], 'string', 'max' => 225],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'artist' => 'Artist',
            'timeline' => 'Timeline',
            'album' => 'Album',
            'filephoto' => 'Filephoto',
        ];
    }
}
