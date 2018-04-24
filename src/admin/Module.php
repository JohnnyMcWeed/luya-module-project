<?php

namespace johnnymcweed\project\admin;

/**
 * Projectmanager Admin Module.
 *
 * File has been created with `module/create` command. 
 * 
 * @author
 * @since 1.0.0
 */
class Module extends \luya\admin\base\Module
{
    public $apis = [
        'api-project-project' => 'johnnymcweed\project\admin\apis\ProjectController',
        'api-project-milestone' => 'johnnymcweed\project\admin\apis\MilestoneController',
        'api-project-task' => 'johnnymcweed\project\admin\apis\TaskController',
        'api-project-time' => 'johnnymcweed\project\admin\apis\TimeController',
       // 'api-project-projectnote' => 'johnnymcweed\project\admin\apis\ProjectnoteController',
       // 'api-project-milestonenote' => 'johnnymcweed\project\admin\apis\MilestonenoteController',
       // 'api-project-tasknote' => 'johnnymcweed\project\admin\apis\TasknoteController',
    ];

    public function getMenu()
    {
        return (new \luya\admin\components\AdminMenuBuilder($this))
            ->node('Project', 'perm_contact_calendar')
            ->group('Group')
            ->itemApi('Project', 'projectadmin/project/index', 'work', 'api-project-project')
            ->itemApi('Milestone', 'projectadmin/milestone/index', 'place', 'api-project-milestone')
            ->itemApi('Task', 'projectadmin/task/index', 'star_border', 'api-project-task')
            ->itemApi('Time', 'projectadmin/time/index', 'hourglass_empty', 'api-project-time')
            //->itemApi('Projectnote', 'projectadmin/projectnote/index', 'label', 'api-project-projectnote', ['hiddenInMenu' => true])
            //->itemApi('Milestonenote', 'projectadmin/milestonenote/index', 'label', 'api-project-milestonenote', ['hiddenInMenu' => true])
            //->itemApi('Tasknote', 'projectadmin/tasknote/index', 'label', 'api-project-tasknote', ['hiddenInMenu' => true])
            ;
    }

    public static function onLoad()
    {
        self::registerTranslation('projectadmin', '@projectadmin/messages', [
            'projectadmin' => 'projectadmin.php',
        ]);
    }

    /**
     * Translate archive messages.
     *
     * @param string $message
     * @param array $params
     * @return string
     */
    public static function t($message, array $params = [])
    {
        return parent::baseT('projectadmin', $message, $params);
    }

    public function getAdminAssets()
    {
        return [
            //'johnnymcweed\notes\admin\assets\NoteAsset'
        ];
    }

}