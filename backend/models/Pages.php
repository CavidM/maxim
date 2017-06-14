<?php

namespace backend\models;

use Yii;
use backend\models\Status;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property integer $status
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url'], 'required'],
//            [['status'], 'integer'],
            [['name', 'url'], 'string', 'max' => 255],
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
            'url' => Yii::t('backend', 'Url'),
            'status' => Yii::t('backend', 'Status'),
        ];
    }

    public function save($runValidation = true, $attributeNames = null)
    {

        $form = Yii::$app->request->post()['Pages'];

        $this->status = ($form['status']) ? Status::STATUS_ACTIVE : Status::STATUS_DELETED;

        return parent::save($runValidation, $attributeNames);
    }

    public function getPages() {

        return self::find()->where(['status' => Status::STATUS_ACTIVE])->asArray()->all();
    }
}
