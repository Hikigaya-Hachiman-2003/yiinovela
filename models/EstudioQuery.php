<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Estudio]].
 *
 * @see Estudio
 */
class EstudioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Estudio[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Estudio|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
