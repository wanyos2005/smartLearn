<?php

namespace app\modules\trainers\models;

use Yii;

/**
 * This is the model class for table "{{%centers}}".
 *
 * @property integer $id
 * @property integer $trainer_id
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
class Centers extends \yii\db\ActiveRecord {

    const head_office = 'yes';
    const not_head_office = 'no';
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_centers';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['trainer_id', 'name', 'county', 'constituency', 'town', 'physical_address'], 'required'],
            [['trainer_id', 'county', 'constituency'], 'integer'],
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
            'trainer_id' => 'Mother Institution',
            'name' => 'Center Name',
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
            'main' => 'Head Office',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\modules\trainers\activeQueries\CentersQuery the active query used by this AR class.
     */
    public static function find() {
        return new \app\modules\trainers\activeQueries\CentersQuery(get_called_class());
    }
    
    /**
     * 
     * @return array head office or not array
     */
    public static function headOffice() {
        return [self::not_head_office => 'No', self::head_office => 'Yes'];
    }

}
