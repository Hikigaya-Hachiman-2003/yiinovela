<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[GenerosHasNovelaVisual]].
 *
 * @see GenerosHasNovelaVisual
 */
class GenerosHasNovelaVisualQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return GenerosHasNovelaVisual[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return GenerosHasNovelaVisual|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
