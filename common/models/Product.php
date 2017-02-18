<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "catalog".
 *
 * @property integer $id
 * @property string $name
 * @property integer $width
 * @property integer $height
 * @property integer $price
 */
class Product extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'catalog';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['width', 'height', 'price'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'width' => 'Width',
            'height' => 'Height',
            'price' => 'Price',
        ];
    }
}
