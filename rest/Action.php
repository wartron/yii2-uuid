<?php

namespace wartron\yii2uuid\rest;

use wartron\yii2uuid\helpers\Uuid;

class Action extends \yii\rest\Action
{

    /**
     * @inheritdoc
     */
    public function findModel($id)
    {
        $id = Uuid::str2uuid($id);
        return parent::findModel($id);
    }
}