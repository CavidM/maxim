<?php

namespace backend\models;

use Yii;
use backend\models\Status;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

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

    public $imageFile;

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
            [['name', 'profession'], 'required'],
            [['name', 'profession', 'image'], 'string', 'max' => 255],
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
            'profession' => Yii::t('backend', 'Profession'),
            'image' => Yii::t('backend', 'Image'),
            'status' => Yii::t('backend', 'Status'),
        ];
    }

    public function save($runValidation = true, $attributeNames = null)
    {

        $form = Yii::$app->request->post()['Team'];

        $this->status = ($form['status']) ? Status::STATUS_ACTIVE : Status::STATUS_DELETED;

//        echo $this->imageFile
        $this->imageFile = UploadedFile::getInstance($this, 'imageFile');

        if($this->imageFile){

            $this->imageFile->saveAs('../uploads/team/' . $this->name . '.' . $this->imageFile->extension);

            $this->image = $this->name . '.' . $this->imageFile->extension;

            $this->imageFile = '';
        }

        return parent::save($runValidation, $attributeNames);
    }

    public function getMemberImage() {

        return Yii::$app->request->baseUrl.'/../uploads/team/'.$this->image;
    }

}
