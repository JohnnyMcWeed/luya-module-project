<?php

namespace johnnymcweed\project\models;

use johnnymcweed\project\admin\Module;
use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Task.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property string $title
 * @property text $text
 * @property integer $milestone_id
 * @property integer $start
 * @property integer $end
 */
class Task extends NgRestModel
{
    /**
     * @inheritdoc
     */
    public $i18n = ['title', 'description'];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_task';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-project-task';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => Module::t('Title'),
            'description' => Module::t('Description'),
            'milestone_id' => Module::t('Milestone'),
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
            [['milestone_id', 'start', 'end'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function genericSearchFields()
    {
        return ['title', 'description'];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'title' => 'text',
            'description' => 'textarea',
            'milestone_id' => [
                'selectModel',
                'modelClass' => Milestone::class,
                'valueField' => 'id',
                'labelField' => 'title'
            ],
            'start' => 'datetime',
            'end' => 'datetime',
        ];
    }

    public function ngRestAttributeGroups()
    {
        return [
            [['start', 'end'], Module::t('Time'), 'collapsed' => true]
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['title', 'milestone_id', 'start', 'end']],
            [['create', 'update'], ['title', 'description', 'milestone_id', 'start', 'end']],
            ['delete', false],
        ];
    }
}