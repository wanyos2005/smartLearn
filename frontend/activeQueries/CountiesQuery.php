<?php

namespace app\activeQueries;

/**
 * This is the ActiveQuery class for [[Counties]].
 *
 * @see Counties
 */
class CountiesQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return Counties[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Counties|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }

}
