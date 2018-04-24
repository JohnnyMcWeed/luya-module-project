<?php

namespace johnnymcweed\project\models;

use Yii;
use luya\admin\ngrest\base\NgRestModel;
use johnnymcweed\project\admin\Module;
/**
 * Milestonenote.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property integer $milestone_id
 * @property integer $note_id
 */
class Milestonenote extends NgRestModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_milestonenote';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-project-milestonenote';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('ID'),
            'milestone_id' => Module::t('Milestone'),
            'note_id' => Module::t('Note'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['milestone_id', 'note_id'], 'integer'],
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
            'milestone_id' => 'number',
            'note_id' => 'number',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['milestone_id', 'note_id']],
            [['create', 'update'], ['milestone_id', 'note_id']],
            ['delete', false],
        ];
    }
}