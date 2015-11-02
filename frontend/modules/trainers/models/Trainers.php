<?php

namespace app\modules\trainers\models;

use Yii;

/**
 * This is the model class for table "{{%trainers}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $website
 * @property string $logo
 * @property string $motto
 * @property string $mission
 * @property string $vision
 * @property string $brief
 * @property string $active
 */
class Trainers extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_trainers';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['motto', 'mission', 'vision', 'brief', 'active'], 'string'],
            [['name', 'website', 'logo'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name of Institution',
            'website' => 'Website',
            'logo' => 'Logo',
            'motto' => 'Motto',
            'mission' => 'Mission Statement',
            'vision' => 'Vision Statement',
            'brief' => 'Brief Description',
            'active' => 'Active',
        ];
    }

    /**
     * 
     * @param int $id trainer id
     * @return Trainers model
     */
    public function returnTrainer($id) {
        $model = new Trainers;
        return $model->findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     * @return \app\modules\trainers\activeQueries\TrainersQuery the active query used by this AR class.
     */
    public static function find() {
        return new \app\modules\trainers\activeQueries\TrainersQuery(get_called_class());
    }

}
