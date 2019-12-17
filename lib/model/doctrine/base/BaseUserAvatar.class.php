<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseUserAvatar extends sfDoctrineRecord
{
  public function setTableDefinition()
  {
    $this->setTableName('user_avatar');
    $this->hasColumn('id', 'integer', 4, array('type' => 'integer', 'primary' => true, 'autoincrement' => true, 'length' => '4'));
    $this->hasColumn('file_name', 'string', 255, array('type' => 'string', 'length' => '255'));
    $this->hasColumn('user_id', 'integer', 4, array('type' => 'integer', 'notnull' => true, 'length' => '4'));
  }

  public function setUp()
  {
    $this->hasOne('sfGuardUser', array('local' => 'user_id',
                                       'foreign' => 'id'));

    $this->hasMany('GenusNote', array('local' => 'id',
                                      'foreign' => 'user_avatar_id'));
  }
}