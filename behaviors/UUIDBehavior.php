<?php

namespace wartron\yii2uuid\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use Rhumsaa\Uuid\Uuid;

class UUIDBehavior extends Behavior
{

    public $column = 'id';
    public $uuidCreateMethod = 'sql';

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
        switch ($this->uuidCreateMethod) {
            case 'sql':
                return $this->owner->getDb()->createCommand("SELECT UNHEX(REPLACE(UUID(),'-',''))")->queryScalar();
                break;
            case 'uuid':
            case 'uuid1':
                return Uuid::uuid1();
            case 'uuid3':
                return Uuid::uuid3(Uuid::NAMESPACE_DNS, 'php.net');
            case 'uuid4':
                return Uuid::uuid4();
            case 'uuid5':
                return Uuid::uuid5(Uuid::NAMESPACE_DNS, 'php.net');
                break;
            default:
                throw new Exception("Invalid method for creating a UUID!", 1);
                break;
        }
    }

}