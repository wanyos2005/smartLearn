<?php

namespace app\modules\institutions\models;

use Yii;

/**
 * This is the model class for table "tbl_course_levels".
 *
 * @property integer $id
 * @property integer $course_id
 * @property string $level
 * @property string $active
 */
class CourseLevels extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_course_levels';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['course_id', 'level'], 'required'],
            [['course_id'], 'integer'],
            [['active'], 'string'],
            [['level'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'course_id' => 'Course',
            'level' => empty(\Yii::$app->params['studyLevels'][$this->level]) ? 'Graduation' : \Yii::$app->params['studyLevels'][$this->level],
            'active' => empty(\Yii::$app->params['studyLevels'][$this->level]) ? 'Active' : \Yii::$app->params['studyLevels'][$this->level],
        ];
    }

    /**
     * 
     * @param integer $course_id course id
     * @param string $level study level
     * @return \app\modules\institutions\models\CourseLevels model
     */
    public function newModel($course_id, $level) {
        $model = new CourseLevels;
        $model->course_id = $course_id;
        $model->level = $level;
        return $model;
    }

    /**
     * 
     * @param integer $course_id course id
     * @param string $level study level
     * @return \app\modules\institutions\models\CourseLevels model
     */
    public function returnLevel($course_id, $level) {
        $model = new CourseLevels;
        return $model->findOne(['course_id' => $course_id, 'level' => $level]);
    }

    /**
     * 
     * @param integer $course_id course id
     * @return \app\modules\institutions\models\CourseLevels models
     */
    public function levelsForCourse($course_id) {
        $model = new CourseLevels;
        return $model->findAll(['course_id' => $course_id]);
    }

    /**
     * 
     * @param integer $course_id course id
     * @param string $level study level
     * @return \app\modules\institutions\models\CourseLevels model
     */
    public function levelToLoad($course_id, $level) {
        $model = new CourseLevels;
        return is_object($ret = $model->returnLevel($course_id, $level)) ? $ret : $model->newModel($course_id, $level);
    }

    /**
     * 
     * @param integer $course_id course id
     * @return \app\modules\institutions\models\CourseLevels models
     */
    public function loadLevels($course_id) {
        $model = new CourseLevels;
        foreach (\Yii::$app->params['studyLevels'] as $key => $studyLevel)
            $studyLevels[$key] = $model->levelToLoad($course_id, $key);

        return $studyLevels;
    }

    /**
     * @inheritdoc
     * @return \app\modules\institutions\activeQueries\CourseLevelsQuery the active query used by this AR class.
     */
    public static function find() {
        return new \app\modules\institutions\activeQueries\CourseLevelsQuery(get_called_class());
    }

}
