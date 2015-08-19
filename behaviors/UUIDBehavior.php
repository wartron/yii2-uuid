<?php

namespace wartron\yii2uuid\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use Rhumsaa\Uuid\Uuid;

class UUIDBehavior extends Behavior
{

    public $column = 'id';

    public $uuidCreateMethod = 'sql';

    public $uuidNamespace;

    public function events()
    {
        return[
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeSave',
        ];
    }

    public function beforeSave()
    {
        if(empty($this->owner->{$this->column}))
            $this->owner->{$this->column} = $this->createUUID();
    }

    public function createUUID()
    {
        switch ($this->uuidCreateMethod) {
            case 'sql':
                return $this->owner->getDb()->createCommand("SELECT UNHEX(REPLACE(UUID(),'-',''))")->queryScalar();
                break;
            case 'uuid':
            case 'uuid1':
                //time based
                return Uuid::uuid1();
            case 'uuid3':
                return Uuid::uuid3(Uuid::NAMESPACE_DNS, $this->getUUIDNamespace());
            case 'uuid4':
                //random
                return Uuid::uuid4();
            case 'uuid5':
                return Uuid::uuid5(Uuid::NAMESPACE_DNS, $this->getUUIDNamespace());
                break;
            default:
                throw new Exception("Invalid method for creating a UUID!", 1);
                break;
        }
    }

    public function getUUIDNamespace()
    {
        if(!empty($this->uuidNamespace))
            return $this->uuidNamespace;

        if(isset(\Yii::$app->params['uuidNamespace']))
            return \Yii::$app->params['uuidNamespace'];

        throw new Exception("UUID Namespace not specified, set the uuidNamespace in the yii params.", 1);
    }
}