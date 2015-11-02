<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%counties}}".
 *
 * @property integer $id
 * @property string $name
 */
class Counties extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_counties';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'County',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\activeQueries\CountiesQuery the active query used by this AR class.
     */
    public static function find() {
        return new \app\activeQueries\CountiesQuery(get_called_class());
    }
    
    /**
     * 
     * @param integer $id county id
     * @return Counties model
     */
    public function returnModel($id) {
        $model = new Counties;
        return $model->findOne($id);
    }
    
    /**
     * 
     * @return Counties array of counties
     */
    public function countiesAsArray() {
        $model = new Counties;
        return Conveniencies::modelsToArray($model->find()->where(true)->orderBy(['name' => SORT_ASC])->all(), 'id', 'name', null);
    }

}
