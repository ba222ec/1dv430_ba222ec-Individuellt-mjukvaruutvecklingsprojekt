<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseUserGroup extends myDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user_group');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('group_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
    }

}