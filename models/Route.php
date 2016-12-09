<?php

namespace humanized\seopage\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $data
 *
 * @property Page $root
 */
class Route extends \yii\db\ActiveRecord
{

    public $root;

    public function load($data, $formName = null)
    {
        if (parent::load($data, $formName) && isset($data['Page'])) {
            return $this->root->load($data);
        }
        return false;
    }

    public function beforeSave($insert)
    {
        if ($this->root->save()) {
            $this->id = $this->root->id;
            return parent::beforeSave($insert);
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'route';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path'], 'required'],
            [['path'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'data' => Yii::t('app', 'Data'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'id']);
    }

}
