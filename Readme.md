# Yii2-UUID

Helpers for using uuids as primary keys

## Installation

Add the uuid behavior to models

    public function behaviors()
    {
        return [
            \wartron\yii2uuid\behaviors\UUIDBehavior::className(),
        ];
    }

To use the formater asHex

    'components' => [
        'formatter' => [
            'class' => '\wartron\yii2uuid\components\Formatter'
        ],
    ]


The Helper providers access to ramsey/uuid. This will automaticly convert to the binary from we use!

    use wartron\yii2uuid\helpers\Uuid;

    //generate uuids
    Uuid::uuid1();
    Uuid::uuid3();
    Uuid::uuid4();
    Uuid::uuid5();

    //converting
    Uuid::str2uuid($hexString);
    Uuid::uuid2str($binary);

To use the rest ActiveControllers

    use wartron\yii2uuid\rest\ActiveController;