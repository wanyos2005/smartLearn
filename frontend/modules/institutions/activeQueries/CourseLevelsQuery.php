<?php

namespace app\modules\institutions\activeQueries;

/**
 * This is the ActiveQuery class for [[\app\modules\institutions\models\CourseLevels]].
 *
 * @see \app\modules\institutions\models\CourseLevels
 */
class CourseLevelsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\institutions\models\CourseLevels[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\institutions\models\CourseLevels|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}