# Yii2-UUID

Helpers for using uuids as primary keys.

## Installation

Add the uuid behavior to models.

We could use the SqlExpression to generate the uuid in sql, but we dont get the ID back in last insert id. (We can get around this with triggers if you want a pure SQL method). But generating the ID UUID in php we dont need to worry about getting the id an refreshing the model.

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

To use the rest ActiveControllers use the provided ActiveController instead of yii\rest\ActiveController

    use wartron\yii2uuid\rest\ActiveController;