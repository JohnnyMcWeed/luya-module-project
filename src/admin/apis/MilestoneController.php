<?php

namespace johnnymcweed\project\admin\apis;

/**
 * Milestone Controller.
 * 
 * File has been created with `crud/create` command. 
 */
class MilestoneController extends \luya\admin\ngrest\base\Api
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'johnnymcweed\project\models\Milestone';
}