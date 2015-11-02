<?php

namespace app\modules\institutions\models;

use Yii;

/**
 * This is the model class for table "{{%campuses}}".
 *
 * @property integer $id
 * @property integer $inst_id
 * @property string $name
 * @property string $phone1
 * @property string $phone2
 * @property string $phone3
 * @property string $email1
 * @property string $email2
 * @property string $postal_address
 * @property integer $county
 * @property integer $constituency
 * @property string $town
 * @property string $physical_address
 * @property string $main
 */
class Campuses extends \yii\db\ActiveRecord {

    const main_campus = 'yes';
    const not_main_campus = 'no';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_campuses';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['inst_id', 'name', 'county', 'constituency', 'town', 'physical_address'], 'required'],
            [['inst_id', 'county', 'constituency'], 'integer'],
            [['main'], 'string'],
            [['name', 'email1', 'email2', 'postal_address', 'physical_address'], 'string', 'max' => 128],
            [['phone1', 'phone2', 'phone3'], 'string', 'max' => 20],
            [['town'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'inst_id' => 'Mother Institution',
            'name' => 'Campus Name',
            'phone1' => 'Phone 1',
            'phone2' => 'Phone 2',
            'phone3' => 'Phone 3',
            'email1' => 'Email 1',
            'email2' => 'Email 2',
            'postal_address' => 'Postal Address',
            'county' => 'County',
            'constituency' => 'Constituency',
            'town' => 'Nearest Town/Urban',
            'physical_address' => 'Physical Address',
            'main' => 'Main Campus',
        ];
    }
    
    /**
     * 
     * @param id $id campus id
     * @return Campuses model
     */
    public function returnCampus($id) {
        $model = new Campuses;
        return $model->findOne(['id' => $id]);
    }

    /**
     * 
     * @param integer $inst_id institution id
     * @return Campuses models
     */
    public function campusesForInstitution($inst_id) {
        $model = new Campuses;
        return $model->find()->where("inst_id='$inst_id'")->orderBy(['name' => SORT_ASC])->all();
    }

    /**
     * @inheritdoc
     * @return \app\modules\institutions\activeQueries\CampusesQuery the active query used by this AR class.
     */
    public static function find() {
        return new \app\modules\institutions\activeQueries\CampusesQuery(get_called_class());
    }

    /**
     * 
     * @return array main campus or not array
     */
    public static function mainCampus() {
        return [self::not_main_campus => 'No', self::main_campus => 'Yes'];
    }

}
