<?php

namespace app\modules\institutions\models;

use Yii;
use app\models\Conveniencies;

/**
 * This is the model class for table "tbl_courses".
 *
 * @property integer $id
 * @property integer $inst_id
 * @property string $course_type
 * @property string $course_name
 * @property string $mean_grade
 * @property integer $annual_fees
 * @property integer $course_duration
 * @property integer $sessions_per_year
 * @property string $active
 */
class Courses extends \yii\db\ActiveRecord {

    const active = 'yes';
    const not_active = 'no';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_courses';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['inst_id', 'course_type', 'course_name', 'mean_grade', 'annual_fees', 'course_duration', 'sessions_per_year'], 'required'],
            [['inst_id', 'annual_fees', 'course_duration', 'sessions_per_year'], 'integer'],
            [['course_name', 'active'], 'string'],
            [['course_type'], 'string', 'max' => 25],
            [['mean_grade'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'inst_id' => 'Institution',
            'course_type' => 'Nature Of Course',
            'course_name' => 'Course Name',
            'mean_grade' => 'Mean Grade',
            'annual_fees' => 'Annual Fees',
            'course_duration' => 'Course Duration',
            'sessions_per_year' => 'Sessions Per Year',
            'active' => 'Active',
        ];
    }
    
    /**
     * 
     * @param id $id course id
     * @return Courses model
     */
    public function returnCourse($id) {
        $model = new Courses;
        return $model->findOne(['id' => $id]);
    }
    
    /**
     * 
     * @param integer $inst_id institution id
     * @return app\modules\institutions\models\Courses models
     */
    public function coursesForInstitution($inst_id) {
        $model = new Courses;
        return $model->find()->where("inst_id='$inst_id'")->orderBy(['course_type' => SORT_ASC, 'course_name' => SORT_ASC])->all();
    }

    /**
     * @inheritdoc
     * @return \app\modules\institutions\activeQueries\CoursesQuery the active query used by this AR class.
     */
    public static function find() {
        return new \app\modules\institutions\activeQueries\CoursesQuery(get_called_class());
    }

    /**
     * 
     * @return array active or not active
     */
    public static function activeNotActive() {
        return [self::active => Conveniencies::capitalizeFirstLetter(self::active), self::not_active => Conveniencies::capitalizeFirstLetter(self::not_active)];
    }

}
