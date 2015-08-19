<?php

namespace wartron\yii2uuid\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;


class UUIDBehavior extends Behavior
{

    public $column = 'id';
    public $method = 'sql';

    public function events()
    {
        return[
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeSave',
        ];
    }

    public function beforeSave()
    {
        $this->owner->{$this->column} = $this->createUUID();
    }

    protected function createUUID()
    {
        switch ($this->method) {
            case 'sql':
                return $this->owner->getDb()->createCommand("SELECT UNHEX(REPLACE(UUID(),'-',''))")->queryScalar()
                break;

            default:
                throw new Exception("Error Processing Request", 1);
                break;
        }
    }

}