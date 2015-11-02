<?php

namespace app\activeQueries;

/**
 * This is the ActiveQuery class for [[\app\models\Users]].
 *
 * @see \app\models\Users
 */
class UsersQuery extends \yii\db\ActiveQuery {
    /* public function active()
      {
      $this->andWhere('[[status]]=1');
      return $this;
      } */

    /**
     * @inheritdoc
     * @return \app\models\Users[]|array
     */
    public function all($db = null) {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Users|array|null
     */
    public function one($db = null) {
        return parent::one($db);
    }
    
    /**
     * Returns the static model of the specified AR class.
     * @return CActiveRecord the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
