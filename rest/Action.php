<?php

namespace wartron\yii2uuid\rest;

use wartron\yii2uuid\helpers\Uuid;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecordInterface;
use yii\web\NotFoundHttpException;

class Action extends \yii\rest\Action
{

    /**
     * @inheritdoc
     */
    public function findModel($id)
    {
        $id = Uuid::str2uuid($id);
        return parent::findModel($id)
    }
}