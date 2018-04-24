<?php

namespace johnnymcweed\project\models;

// use johnnymcweed\notes\admin\plugins\NoteArray;
use johnnymcweed\project\admin\Module;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Project.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property string $title
 * @property text $text
 * @property integer $customer_id
 */
class Project extends NgRestModel
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
        return 'project_project';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-project-project';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('ID'),
            'title' => Module::t('Title'),
            'description' => Module::t('Description'),
            'customer_id' => Module::t('Customer ID'),
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
            [['customer_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['notes'], 'safe']
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
            'customer_id' => 'number',
            // TODO: Connect to Business / Customer Table
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['title', 'customer_id']],
            [['create', 'update'], ['title', 'description', 'customer_id']],
            ['delete', false],
        ];
    }

    public function extraFields()
    {
        return ['notes'];
    }

    public function ngRestExtraAttributeTypes()
    {
        return [
            'notes' => [
                //'class' => NoteArray::class
            ]
        ];
    }

}