<?php

namespace johnnymcweed\project\models;

use johnnymcweed\project\admin\Module;
use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Tasknote.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property integer $task_id
 * @property integer $note_id
 */
class Tasknote extends NgRestModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_tasknote';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-project-tasknote';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('ID'),
            'task_id' => Yii::t('Task'),
            'note_id' => Yii::t('Note'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id', 'note_id'], 'integer'],
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
            'task_id' => 'number',
            'note_id' => 'number',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['task_id', 'note_id']],
            [['create', 'update'], ['task_id', 'note_id']],
            ['delete', false],
        ];
    }
}