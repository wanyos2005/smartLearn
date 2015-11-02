<?php

namespace app\modules\trainers\activeQueries;

/**
 * This is the ActiveQuery class for [[\app\modules\trainers\models\Trainers]].
 *
 * @see \app\modules\trainers\models\Trainers
 */
class TrainersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\trainers\models\Trainers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\trainers\models\Trainers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}