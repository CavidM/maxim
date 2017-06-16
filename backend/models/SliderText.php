<?php

namespace backend\models;

use Yii;
use backend\models\Status;

/**
 * This is the model class for table "slider_text".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 */
class SliderText extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider_text';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'status' => Yii::t('backend', 'Status'),
        ];
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        $post = yii::$app->request->post('SliderText');

        $this->status = ($post['status']) ? Status::STATUS_ACTIVE : Status::STATUS_DELETED;

        return parent::save($runValidation, $attributeNames);
    }
}
