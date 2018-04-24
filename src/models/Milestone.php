<?php

namespace johnnymcweed\project\models;

use johnnymcweed\project\admin\Module;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Milestone.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property string $title
 * @property text $text
 * @property integer $project_id
 * @property integer $dueDate
 */
class Milestone extends NgRestModel
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
        return 'project_milestone';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-project-milestone';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => Module::t('Title'),
            'description' => Module::t('Description'),
            'project_id' => Module::t('Project'),
            'dueDate' => Module::t('Due Date'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['project_id', 'dueDate'], 'integer'],
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
            'project_id' => [
                'selectModel',
                'modelClass' => Project::class,
                'valueField' => 'id',
                'labelField' => 'title'
            ],
            'dueDate' => 'datetime',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['title', 'project_id', 'dueDate']],
            [['create', 'update'], ['title', 'description', 'project_id', 'dueDate']],
            ['delete', false],
        ];
    }
}