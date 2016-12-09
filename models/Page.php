<?php

namespace humanized\seopage\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $label
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 *
 * @property Article $article
 */
class Page extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label', 'title'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['title', 'label'], 'string', 'max' => 55],
            [['description'], 'string', 'max' => 200],
            [['label'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'label' => Yii::t('app', 'Label'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
        ];
    }

}
