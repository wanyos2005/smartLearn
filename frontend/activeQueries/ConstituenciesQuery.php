<?php

namespace app\activeQueries;

/**
 * This is the ActiveQuery class for [[\app\models\Constituencies]].
 *
 * @see \app\models\Constituencies
 */
class ConstituenciesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\models\Constituencies[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Constituencies|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}