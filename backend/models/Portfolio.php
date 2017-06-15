<?php

namespace backend\models;

use Yii;
use backend\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "portfolio".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $category
 */
class Portfolio extends \yii\db\ActiveRecord
{

    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'image', 'category'], 'required'],
            [['name', 'image'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * custom rule for category
     */
    public function checkIsArray(){

        if(!is_array($this->category)){
            $this->addError('category','Category is not array!');
        }
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'name' => Yii::t('backend', 'Name'),
            'image' => Yii::t('backend', 'Image'),
            'category' => Yii::t('backend', 'Category'),
        ];
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        $post = yii::$app->request->post('Portfolio');

//        VarDumper::dump($post,6,true); die();

        $this->category = implode(',', $post['category']);

        $this->imageFile = UploadedFile::getInstance($this, 'imageFile');

        if($this->imageFile){

            $this->imageFile->saveAs('../uploads/portfolio/' . $this->name . '.' . $this->imageFile->extension);

            $this->image = $this->name . '.' . $this->imageFile->extension;

            $this->imageFile = '';
        }

        return parent::save($runValidation, $attributeNames);
    }

    public function getCategories()
    {
        $categoryModel = new Category();

        return $categoryModel::find()->asArray()->all();
    }

    public function getMemberImage() {

        return Yii::$app->request->baseUrl.'/../uploads/portfolio/'.$this->image;
    }
}
