<?php

use CQ\DB\Migration;

class CreateHistoryTable extends Migration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $history = $this->table('history');
        $history
            ->addColumn('app_id',       'uuid')
            ->addColumn('user_id',      'uuid')
            ->addColumn('user_agent',   'text')
            ->addColumn('user_ip',      'string')
            ->addColumn('updated_at',   'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('created_at',   'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
