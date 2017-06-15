<?php

namespace backend\models;

use Yii;
use backend\models\Status;
use yii\web\UploadedFile;

/**
 * This is the model class for table "blog".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $category
 * @property integer $status
 * @property string $date
 */
class Blog extends \yii\db\ActiveRecord
{

    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name', 'description', 'image', 'date'], 'string', 'max' => 255],
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
            'category' => Yii::t('backend', 'Category'),
            'status' => Yii::t('backend', 'Status'),
            'date' => Yii::t('backend', 'Date'),
        ];
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        $post = yii::$app->request->post('Blog');

        $this->status = ($post['status']) ? Status::STATUS_ACTIVE : Status::STATUS_DELETED;

        $this->category = implode(',', $post['category']);

        $this->imageFile = UploadedFile::getInstance($this, 'imageFile');

        if($this->imageFile){

            $this->imageFile->saveAs('../uploads/blog/' . $this->name . '.' . $this->imageFile->extension);

            $this->image = $this->name . '.' . $this->imageFile->extension;

            $this->imageFile = '';
        }

        return parent::save($runValidation, $attributeNames);
    }

    public function getCategories()
    {
        $categoryModel = new BlogCategory();

        return $categoryModel::find()->asArray()->all();
    }

    public function getMemberImage() {

        return Yii::$app->request->baseUrl.'/../uploads/blog/'.$this->image;
    }
}
