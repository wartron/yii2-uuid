<?php

namespace wartron\yii2uuid\behaviors;

use yii\base\Behavior;
use wartron\yii2uuid\helpers\Uuid;

class UUIDBehavior extends Behavior
{

    public $column = 'id';
    public $uuidStrategy = null;

    public function events()
    {
        return[
            \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => 'beforeCreate',
        ];
    }

    public function beforeCreate()
    {
        if(empty($this->owner->{$this->column}))
            $this->owner->{$this->column} = $this->createUUID();
    }

    public function createUUID()
    {
        return Uuid::uuid($this->uuidStrategy);
    }

}