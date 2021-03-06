<?php

namespace johnnymcweed\project\admin\apis;

/**
 * Project Controller.
 * 
 * File has been created with `crud/create` command. 
 */
class ProjectController extends \luya\admin\ngrest\base\Api
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'johnnymcweed\project\models\Project';
}