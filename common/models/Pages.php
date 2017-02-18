<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $name
 * @property string $search_link
 * @property string $text
 * @property string $bottom_text
 */
class Pages extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['text', 'bottom_text'], 'string'],
            [['name', 'search_link'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'search_link' => 'Search Link',
            'text' => 'Text',
            'bottom_text' => 'Bottom Text',
        ];
    }
}
