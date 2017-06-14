<?php

namespace backend\models;

use Yii;
use backend\models\Category;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "portfolio".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $category_id
 */
class Portfolio extends \yii\db\ActiveRecord
{
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
            'image' => Yii::t('backend', 'Image'),
            'category' => Yii::t('backend', 'Category'),
        ];
    }

    public function getCategories()
    {
        $categoryModel = new Category();

        return $categoryModel::find()->asArray()->all();
    }
}
