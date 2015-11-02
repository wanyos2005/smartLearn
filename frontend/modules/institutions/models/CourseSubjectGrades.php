<?php

namespace app\modules\institutions\models;

use app\models\Conveniencies;
use Yii;

/**
 * This is the model class for table "tbl_course_subject_grades".
 *
 * @property integer $id
 * @property integer $course_id
 * @property string $subject
 * @property string $min_grade
 */
class CourseSubjectGrades extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_course_subject_grades';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['course_id', 'subject'], 'required'],
            [['course_id'], 'integer'],
            [['subject'], 'string', 'max' => 5],
            [['min_grade'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'course_id' => 'Course',
            'subject' => ($sbjct = Conveniencies::subjectName($this->subject)) !== Conveniencies::unknown ? $sbjct : 'Subject',
            'min_grade' => $sbjct !== Conveniencies::unknown ? $sbjct : 'Minimum Grade',
        ];
    }

    /**
     * 
     * @param integer $course_id course id
     * @param string $subject subject symbol
     * @return \app\modules\institutions\models\CourseSubjectGrades model
     */
    public function newModel($course_id, $subject) {
        $model = new CourseSubjectGrades;
        $model->course_id = $course_id;
        $model->subject = $subject;

        return $model;
    }

    /**
     * 
     * @param integer $course_id course id
     * @param string $subject subject symbol
     * @return \app\modules\institutions\models\CourseSubjectGrades model
     */
    public function gradeForSubjectAndCourse($course_id, $subject) {
        $model = new CourseSubjectGrades;
        return $model->findOne(['course_id' => $course_id, 'subject' => $subject]);
    }

    /**
     * 
     * @param integer $course_id course id
     * @return \app\modules\institutions\models\CourseSubjectGrades models
     */
    public function subjectsForCourse($course_id) {
        $model = new CourseSubjectGrades;
        return $model->findAll(['course_id' => $course_id]);
    }

    /**
     * 
     * @param integer $course_id course id
     * @param string $subject subject symbol
     * @return \app\modules\institutions\models\CourseSubjectGrades model
     */
    public function subjectToLoad($course_id, $subject) {
        $model = new CourseSubjectGrades;
        return is_object($ret = $model->gradeForSubjectAndCourse($course_id, $subject)) ? $ret : $model->newModel($course_id, $subject);
    }

    /**
     * 
     * @param int $course_id course id
     * @return \app\modules\institutions\models\CourseSubjectGrades models
     */
    public function loadGradesInCats($course_id) {
        $model = new CourseSubjectGrades;
        foreach (Conveniencies::subjectCategories() as $cat)
            foreach (Conveniencies::subjectsInACategory($cat) as $symbol => $subject)
                $subjects[$cat][$symbol] = $model->subjectToLoad($course_id, $symbol);

        return $subjects;
    }

    /**
     * @inheritdoc
     * @return \app\modules\institutions\activeQueries\CourseSubjectGradesQuery the active query used by this AR class.
     */
    public static function find() {
        return new \app\modules\institutions\activeQueries\CourseSubjectGradesQuery(get_called_class());
    }

}
