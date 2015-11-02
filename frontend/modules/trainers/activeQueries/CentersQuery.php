<?php

namespace app\modules\trainers\activeQueries;

/**
 * This is the ActiveQuery class for [[\app\modules\trainers\models\Centers]].
 *
 * @see \app\modules\trainers\models\Centers
 */
class CentersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\trainers\models\Centers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\trainers\models\Centers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}