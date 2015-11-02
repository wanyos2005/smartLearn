<?php

namespace app\modules\person\activeQueries;

/**
 * This is the ActiveQuery class for [[\app\modules\person\models\StudentSubjectScores]].
 *
 * @see \app\modules\person\models\StudentSubjectScores
 */
class StudentSubjectScoresQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\person\models\StudentSubjectScores[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\person\models\StudentSubjectScores|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}