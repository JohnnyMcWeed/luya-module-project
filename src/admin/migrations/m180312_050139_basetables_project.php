<?php

use yii\db\Migration;

/**
 * Class m180312_050139_basetables_project
 */
class m180312_050139_basetables_project extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('project_project', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'customer_id' => $this->integer(),

            'is_deleted' => $this->integer(),
        ]);

        $this->createTable('project_milestone', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'project_id' => $this->integer(),
            'dueDate' => $this->integer(),

            'is_deleted' => $this->integer(),
        ]);

        $this->createTable('project_task', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'milestone_id' => $this->integer(),
            'start' => $this->integer(),
            'end' => $this->integer(),

            'is_deleted' => $this->integer(),
        ]);

        $this->createTable('project_time', [
            'id' => $this->primaryKey(),
            'description' => $this->text(),
            'task_id' => $this->integer(),
            'start' => $this->integer(),
            'end' => $this->integer(),

            'is_deleted' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('project_note');
        $this->dropTable('project_time');
        $this->dropTable('project_task');
        $this->dropTable('project_milestone');
        $this->dropTable('project_project');
    }
}
