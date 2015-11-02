<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%constituencies}}".
 *
 * @property integer $id
 * @property integer $county_id
 * @property string $name
 */
class Constituencies extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_constituencies';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['county_id', 'name'], 'required'],
            [['county_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'county_id' => 'County',
            'name' => 'Constituency',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\activeQueries\ConstituenciesQuery the active query used by this AR class.
     */
    public static function find() {
        return new \app\activeQueries\ConstituenciesQuery(get_called_class());
    }
    
    /**
     * 
     * @param integer $id constituency id
     * @return Constituencies model
     */
    public function returnModel($id) {
        $model = new Constituencies;
        return $model->findOne($id);
    }
    
    /**
     * 
     * @return Constituencies array of constituencies
     */
    public function constituenciesAsArray($county_id) {
        $model = new Constituencies;
        return Conveniencies::modelsToArray($model->find()->where(empty($county_id) ? true : "county_id='$county_id'")->orderBy(['name' => SORT_ASC])->all(), 'id', 'name', null);
    }

}
