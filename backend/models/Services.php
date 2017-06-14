<?php

namespace backend\models;

use Yii;
use backend\models\Status;
use yii\web\UploadedFile;

/**
 * This is the model class for table "services".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property integer $status
 */
class Services extends \yii\db\ActiveRecord
{

    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name', 'description', 'image'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
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
            'description' => Yii::t('backend', 'Description'),
            'image' => Yii::t('backend', 'Image'),
            'status' => Yii::t('backend', 'Status'),
        ];
    }

    public function save($runValidation = true, $attributeNames = null)
    {

        $form = Yii::$app->request->post()['Services'];

        $this->status = ($form['status']) ? Status::STATUS_ACTIVE : Status::STATUS_DELETED;

        $this->imageFile = UploadedFile::getInstance($this, 'imageFile');

        if($this->imageFile){

            $this->imageFile->saveAs('../uploads/services/' . $this->name . '.' . $this->imageFile->extension);

            $this->image = $this->name . '.' . $this->imageFile->extension;

            $this->imageFile = '';
        }

        return parent::save($runValidation, $attributeNames);
    }

    public function getMemberImage() {

        return Yii::$app->request->baseUrl.'/../uploads/services/'.$this->image;
    }
}
