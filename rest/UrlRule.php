<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace wartron\yii2uuid\rest;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Inflector;
use yii\web\CompositeUrlRule;


class UrlRule extends \yii\rest\UrlRule
{
    /**
     * @var array list of tokens that should be replaced for each pattern. The keys are the token names,
     * and the values are the corresponding replacements.
     * @see patterns
     */
    public $tokens = [
        '{id}' => '<id>',
    ];
  }
