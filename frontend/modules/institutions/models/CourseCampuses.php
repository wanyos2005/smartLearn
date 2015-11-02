<?php

namespace app\modules\institutions\models;

use Yii;
use app\modules\institutions\models\Campuses;
use app\modules\institutions\models\Courses;

/**
 * This is the model class for table "tbl_course_campuses".
 *
 * @property integer $id
 * @property integer $campus_id
 * @property integer $course_id
 * @property string $active
 */
class CourseCampuses extends \yii\db\ActiveRecord {

    const active = 'yes';
    const not_active = 'no';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_course_campuses';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['campus_id', 'course_id'], 'required'],
            [['campus_id', 'course_id'], 'integer'],
            [['active'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'campus_id' => is_object($campus = Campuses::returnCampus($this->campus_id)) && !empty($campus->name) ? $campus->name : 'Campus',
            'course_id' => is_object($course = Courses::returnCourse($this->course_id)) && !empty($course->course_name) ? $course->course_name : 'Course',
            'active' => 'Active',
        ];
    }

    /**
     * 
     * @param integer $campus_id campus id
     * @param integer $course_id course id
     * @return \app\modules\institutions\models\CourseCampuses model
     */
    public function newModel($campus_id, $course_id) {
        $model = new CourseCampuses;
        $model->campus_id = $campus_id;
        $model->course_id = $course_id;
        $model->active = self::active;

        return $model;
    }

    /**
     * 
     * @param integer $campus_id campus id
     * @param integer $course_id course id
     * @return \app\modules\institutions\models\CourseCampuses model
     */
    public function courseCampus($campus_id, $course_id) {
        $model = new CourseCampuses;
        return $model->findOne(['campus_id' => $campus_id, 'course_id' => $course_id]);
    }

    /**
     * 
     * @param integer $course_id course id
     * @return \app\modules\institutions\models\CourseCampuses models
     */
    public function campusesForCourse($course_id) {
        $model = new CourseCampuses;
        return $model->findAll(['course_id' => $course_id]);
    }

    /**
     * 
     * @param integer $campus_id campus id
     * @return \app\modules\institutions\models\CourseCampuses models
     */
    public function coursesForCampus($campus_id) {
        $model = new CourseCampuses;
        return $model->findAll(['campus_id' => $campus_id]);
    }

    /**
     * 
     * @param integer $campus_id campus id
     * @param integer $course_id course id
     * @return \app\modules\institutions\models\CourseCampuses model
     */
    public function loadThisCourseCampus($campus_id, $course_id) {
        $model = new CourseCampuses;
        return is_object($return = $model->courseCampus($campus_id, $course_id)) ? $return : $model->newModel($campus_id, $course_id);
    }

    /**
     * 
     * @param integer $inst_id institution id
     * @param integer $course_id course id
     * @return \app\modules\institutions\models\CourseCampuses models
     */
    public function modelsOntoCourseForm($inst_id, $course_id) {
        $model = new CourseCampuses;

        foreach (Campuses::campusesForInstitution($inst_id) as $campus)
            $models[$campus->id] = $model->loadThisCourseCampus($campus->id, $course_id);

        return empty($models) ? [] : $models;
    }
    
    /**
     * 
     * @param integer $inst_id institution id
     * @param integer $campus_id campus id
     * @return \app\modules\institutions\models\CourseCampuses models
     */
    public function modelsOntoCampusForm($inst_id, $campus_id) {
        $model = new CourseCampuses;
        
        foreach (Courses::coursesForInstitution($inst_id) as $course)
            $models[$course->id] = $model->loadThisCourseCampus($campus_id, $course->id);

        return empty($models) ? [] : $models;
    }

    /**
     * @inheritdoc
     * @return \app\modules\institutions\activeQueries\CourseCampusesQuery the active query used by this AR class.
     */
    public static function find() {
        return new \app\modules\institutions\activeQueries\CourseCampusesQuery(get_called_class());
    }

}
