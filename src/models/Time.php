<?php

namespace johnnymcweed\project\models;

use johnnymcweed\project\admin\Module;
use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Time.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property text $text
 * @property integer $task_id
 * @property integer $start
 * @property integer $end
 * @property tinyint $paid
 */
class Time extends NgRestModel
{
    /**
     * @inheritdoc
     */
    public $i18n = ['description'];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_time';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-project-time';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'description' => Module::t('Description'),
            'task_id' => Module::t('Task'),
            'start' => Module::t('Start'),
            'end' => Module::t('End'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['task_id', 'start', 'end'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function genericSearchFields()
    {
        return ['description'];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'description' => 'textarea',
            'task_id' => [
                'selectModel',
                'modelClass' => Task::class,
                'valueField' => 'id',
                'labelField' => 'title'
            ],
            'start' => 'datetime',
            'end' => 'datetime'
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['task_id', 'start', 'end']],
            [['create', 'update'], ['description', 'task_id', 'start', 'end']],
            ['delete', false],
        ];
    }
}