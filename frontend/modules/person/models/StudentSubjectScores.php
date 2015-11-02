<?php

namespace app\modules\person\models;

use Yii;
use app\models\Conveniencies;

/**
 * This is the model class for table "{{%student_subject_scores}}".
 *
 * @property integer $id
 * @property integer $stud_id
 * @property string $subject
 * @property string $grade
 */
class StudentSubjectScores extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_student_subject_scores';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['stud_id', 'subject'], 'required'],
            [['stud_id'], 'integer'],
            [['subject'], 'string', 'max' => 5],
            [['grade'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'id',
            'stud_id' => 'Student ID',
            'subject' => ($sbjct = Conveniencies::subjectName($this->subject)) !== Conveniencies::unknown ? $sbjct : 'Subject',
            'grade' => $sbjct !== Conveniencies::unknown ? $sbjct : 'Grade',
        ];
    }

    /**
     * 
     * @param integer $stud_id person id
     * @param string $subject subject symbol
     * @return \app\modules\person\models\StudentSubjectScores model
     */
    public function newScore($stud_id, $subject) {
        $model = new StudentSubjectScores;
        $model->stud_id = $stud_id;
        $model->subject = $subject;
        return $model;
    }

    /**
     * 
     * @param \app\modules\person\models\StudentSubjectScores $model model
     */
    public function modelSave($model) {
        if (!empty($model->grade) || !$model->isNewRecord)
            $model->save();
    }

    /**
     * 
     * @param integer $stud_id person id
     * @return StudentSubjectScores array
     */
    public function scoresForStudent($stud_id) {
        $model = new StudentSubjectScores;
        return $model->find()->where("stud_id='$stud_id'")->all();
    }

    /**
     * 
     * @param integer $stud_id person id
     * @param string $subject subject symbol
     * @return \app\modules\person\models\StudentSubjectScores model
     */
    public function scoreForStudentAndSubject($stud_id, $subject) {
        $model = new StudentSubjectScores;
        return $model->find()->where("stud_id='$stud_id' && subject='$subject'")->one();
    }

    /**
     * 
     * @@param integer $stud_id person id
     * @param array $subjects subject symbol
     * @return \app\modules\person\models\StudentSubjectScores models array
     */
    public function scoresOntoForm($stud_id, $subjects) {
        $model = new StudentSubjectScores;

        foreach ($subjects as $symbol => $subjects)
            if (!is_object($models[$symbol] = $model->scoreForStudentAndSubject($stud_id, $symbol)))
                $models[$symbol] = $model->newScore($stud_id, $symbol);

        return $models;
    }

    /**
     * @inheritdoc
     * @return \app\modules\person\activeQueries\StudentSubjectScoresQuery the active query used by this AR class.
     */
    public static function find() {
        return new \app\modules\person\activeQueries\StudentSubjectScoresQuery(get_called_class());
    }

}
