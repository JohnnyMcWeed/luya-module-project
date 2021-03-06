<?php

namespace johnnymcweed\project\admin\controllers;

/**
 * Task Controller.
 * 
 * File has been created with `crud/create` command. 
 */
class TaskController extends \luya\admin\ngrest\base\Controller
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'johnnymcweed\project\models\Task';
}