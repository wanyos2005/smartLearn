<?php

namespace app\modules\institutions\activeQueries;

/**
 * This is the ActiveQuery class for [[\app\modules\institutions\models\CourseSubjectGrades]].
 *
 * @see \app\modules\institutions\models\CourseSubjectGrades
 */
class CourseSubjectGradesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\institutions\models\CourseSubjectGrades[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\institutions\models\CourseSubjectGrades|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}