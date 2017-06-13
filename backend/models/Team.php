<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property integer $id
 * @property string $name
 * @property string $profession
 * @property string $image
 * @property integer $status
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'profession', 'image', 'status'], 'required'],
            [['status'], 'integer'],
            [['name', 'profession', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'name' => Yii::t('backend', 'Name'),
            'profession' => Yii::t('backend', 'Profession'),
            'image' => Yii::t('backend', 'Image'),
            'status' => Yii::t('backend', 'Status'),
        ];
    }
}
