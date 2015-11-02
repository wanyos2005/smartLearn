<?php

namespace app\modules\person\activeQueries;

/**
 * This is the ActiveQuery class for [[\app\modules\person\models\Person]].
 *
 * @see \app\modules\person\models\Person
 */
class PersonQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\person\models\Person[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\person\models\Person|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}