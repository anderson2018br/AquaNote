<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseSubFamily extends sfDoctrineRecord
{
  public function setTableDefinition()
  {
    $this->setTableName('sub_family');
    $this->hasColumn('id', 'integer', 8, array('type' => 'integer', 'primary' => true, 'autoincrement' => true, 'length' => '8'));
    $this->hasColumn('name', 'string', 255, array('type' => 'string', 'notnull' => true, 'length' => '255'));
    $this->hasColumn('description', 'string', 2147483647, array('type' => 'string', 'length' => '2147483647'));
    $this->hasColumn('created_at', 'date', 25, array('type' => 'date', 'length' => '25'));
    $this->hasColumn('updated_at', 'date', 25, array('type' => 'date', 'length' => '25'));
  }

  public function setUp()
  {
    $this->hasMany('Genus', array('local' => 'id',
                                  'foreign' => 'sub_family_id'));
  }
}