<?php

namespace common\models;

use Yii;

/**
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
            [['id', 'name', 'width', 'height', 'price'], 'safe'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'width' => 'Ширина',
            'height' => 'Высота',
            'price' => 'Цена',
        ];
    }
}
