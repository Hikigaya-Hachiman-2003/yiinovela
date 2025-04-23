<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Novelavisual]].
 *
 * @see Novelavisual
 */
class NovelavisualQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Novelavisual[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Novelavisual|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
