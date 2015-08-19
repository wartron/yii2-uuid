# Yii2-UUID

Helpers for using uuids and primary keys

## Installation

Add the uuid behavior to models

    public function behaviors()
    {
        return [
            UUIDBehavior::className(),
        ];
    }

To use the formater asHex

    'components' => [
        'formatter' => [
            'class' => 'wartron\yii2uuid\components\Formatter'
        ],
    ]

