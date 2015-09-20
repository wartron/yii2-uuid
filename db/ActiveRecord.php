<?php

namespace wartron\yii2uuid\db;

use Yii;
use wartron\yii2uuid\helpers\Uuid;

class ActiveRecord extends \yii\db\ActiveRecord
{
    //TODO: need to maybe have the UuidValidator or rule do this?
    public $uuidRelations = [];
    public $uuidStrategy = null;

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if(empty($this->id))
                $this->id = $this->createUUID();
            return true;
        }
        return false;
    }

    public function createUUID()
    {
        return Uuid::uuid($this->uuidStrategy);
    }

    public function toArray(array $fields = [], array $expand = [], $recursive = true)
    {
        $data = parent::toArray($fields,$expand,$recursive);
        $data['id'] = strtoupper(bin2hex($data['id']));

        foreach($this->uuidRelations as $relationKey)
        {
            if(isset($data[$relationKey]))
                $data[$relationKey] = strtoupper(bin2hex($data[$relationKey]));
        }

        return $data;
    }

}
