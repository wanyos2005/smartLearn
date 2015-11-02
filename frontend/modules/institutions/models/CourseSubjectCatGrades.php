<?php

namespace app\modules\institutions\models;

use Yii;
use app\models\Conveniencies;

/**
 * This is the model class for table "tbl_course_subject_cat_grades".
 *
 * @property integer $id
 * @property integer $course_id
 * @property string $category
 * @property integer $no_of_subjects
 * @property string $min_grade
 */
class CourseSubjectCatGrades extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_course_subject_cat_grades';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['course_id', 'category'], 'required'],
            [['course_id', 'no_of_subjects'], 'integer'],
            [['category'], 'string', 'max' => 25],
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
            'category' => ($cat = Conveniencies::categoryName($this->category)) !== Conveniencies::unknown ? $cat : 'Category',
            'no_of_subjects' => 'No Of Subjects',
            'min_grade' => $cat !== Conveniencies::unknown ? $cat : 'Minimum Grade',
        ];
    }
    
    /**
     * 
     * @param integer $course_id course id
     * @param string $category subject category
     * @return \app\modules\institutions\models\CourseSubjectCatGrades model
     */
    public function newModel($course_id, $category) {
        $model = new CourseSubjectCatGrades;
        $model->course_id = $course_id;
        $model->category = $category;
        $model->no_of_subjects = 1;
        return $model;;
    }
    
    /**
     * 
     * @param integer $course_id course id
     * @param string $category subject category
     * @return \app\modules\institutions\models\CourseSubjectCatGrades model
     */
    public function gradeForCourseAndCategory($course_id, $category) {
        $model = new CourseSubjectCatGrades;
        return $model->findOne(['course_id' => $course_id, 'category' => $category]);
    }
    
    /**
     * 
     * @param integer $course_id course id
     * @return \app\modules\institutions\models\CourseSubjectCatGrades models
     */
    public function categoriesForCourse($course_id) {
        $model = new CourseSubjectCatGrades;
        return $model->findAll(['course_id' => $course_id]);
    }
    
    /**
     * 
     * @param integer $course_id course id
     * @param string $category subject category
     * @return \app\modules\institutions\models\CourseSubjectCatGrades model
     */
    public function catToLoad($course_id, $category) {
        $model = new CourseSubjectCatGrades;
        return is_object($ret = $model->gradeForCourseAndCategory($course_id, $category)) ? $ret : $model->newModel($course_id, $category);
    }
    
    /**
     * 
     * @param integer $course_id course id
     * @return \app\modules\institutions\models\CourseSubjectCatGrades models
     */
    public function loadCatGrades($course_id) {
        $model = new CourseSubjectCatGrades;
        
        foreach (Conveniencies::subjectCategories() as $cat)
            $cats[$cat] = $model->catToLoad ($course_id, $cat);
        
        return $cats;
    }

    /**
     * @inheritdoc
     * @return \app\modules\institutions\activeQueries\CourseSubjectCatGradesQuery the active query used by this AR class.
     */
    public static function find() {
        return new \app\modules\institutions\activeQueries\CourseSubjectCatGradesQuery(get_called_class());
    }

}
