<?php

namespace app\modules\institutions\models;

use Yii;

/**
 * This is the model class for table "{{%institutions}}".
 *
 * @property integer $id
 * @property string $inst_name
 * @property string $inst_type
 * @property string $website
 * @property string $logo
 * @property string $motto
 * @property string $mission
 * @property string $vision
 * @property string $active
 */
class Institutions extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_institutions';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['inst_name', 'inst_type'], 'required'],
            [['motto', 'mission', 'vision', 'active'], 'string'],
            [['inst_name', 'website', 'logo'], 'string', 'max' => 128],
            [['inst_type'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'inst_name' => 'Name of Institution',
            'inst_type' => 'Institution Type',
            'website' => 'Website',
            'logo' => 'Logo',
            'motto' => 'Motto',
            'mission' => 'Mission Statement',
            'vision' => 'Vision Statement',
            'active' => 'Active',
        ];
    }

    /**
     * 
     * @param int $id institution id
     * @return Institutions model
     */
    public function returnInstitution($id) {
        $model = new Institutions;
        return $model->findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     * @return \app\modules\institutions\activeQueries\InstitutionsQuery the active query used by this AR class.
     */
    public static function find() {
        return new \app\modules\institutions\activeQueries\InstitutionsQuery(get_called_class());
    }

}
