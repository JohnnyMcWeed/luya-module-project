<?php

namespace johnnymcweed\project\models;

use johnnymcweed\project\admin\Module;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Projectnote.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $note_id
 */
class Projectnote extends NgRestModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_projectnote';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-project-projectnote';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('ID'),
            'project_id' => Module::t('Project'),
            'note_id' => Module::t('Note'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'note_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function genericSearchFields()
    {
        return [''];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'project_id' => 'number',
            'note_id' => 'number',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['project_id', 'note_id']],
            [['create', 'update'], ['project_id', 'note_id']],
            ['delete', false],
        ];
    }
}