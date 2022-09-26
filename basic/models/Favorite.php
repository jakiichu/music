<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "favorite".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_track
 */
class Favorite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favorite';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_track'], 'required'],
            [['id_user', 'id_track'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_track' => 'Id Track',
        ];
    }
}
