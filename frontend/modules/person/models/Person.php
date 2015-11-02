<?php

namespace app\modules\person\models;

use Yii;

/**
 * This is the model class for table "{{%person}}".
 *
 * @property integer $id
 * @property string $fname
 * @property string $mname
 * @property string $lname
 * @property string $gender
 * @property string $dob
 * @property string $id_no
 * @property string $phone
 * @property integer $cse_yr
 * @property string $cse_index
 * @property integer $grade
 */
class Person extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_person';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['fname', 'lname', 'gender', 'cse_yr', 'cse_index', 'grade'], 'required'],
            ['fname', 'notNumeric'],
            [['gender'], 'string'],
            [['dob'], 'safe'],
            [['cse_yr'], 'integer'],
            [['fname', 'mname', 'lname'], 'string', 'max' => 25],
            [['id_no'], 'string', 'max' => 8],
            [['grade'], 'string', 'max' => 2],
            [['phone', 'cse_index'], 'string', 'max' => 13]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'fname' => 'First/English Name',
            'mname' => 'Middle/Given Name',
            'lname' => 'Family/Last/Surname',
            'gender' => 'Gender',
            'dob' => 'Date of Birth',
            'id_no' => 'Nat. ID. No.',
            'phone' => 'Cell Phone No.',
            'cse_yr' => 'KCSE Year',
            'cse_index' => 'Index No.',
            'grade' => 'Mean Grade',
        ];
    }

    public function notNumeric($attribute, $params) {
        if (is_numeric($this->$attribute))
            $this->addError($attribute, $this->getAttributeLabel($attribute) . ' cannot be numeric');
    }

    /**
     * 
     * @param int $id person id
     * @return Person model
     */
    public function returnPerson($id) {
        $model = new Person;
        return $model->findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     * @return \app\modules\person\activeQueries\PersonQuery the active query used by this AR class.
     */
    public static function find() {
        return new \app\modules\person\activeQueries\PersonQuery(get_called_class());
    }

}
