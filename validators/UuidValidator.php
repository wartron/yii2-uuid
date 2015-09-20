<?php

namespace wartron\yii2uuid\validators;

use wartron\yii2uuid\helpers\Uuid;

class UuidValidator extends \yii\validators\Validator
{
    /**
     * @inheritdoc
     */
    public function validateAttribute($model, $attribute)
    {
        $model->$attribute = Uuid::str2uuid($model->$attribute);
    }

}