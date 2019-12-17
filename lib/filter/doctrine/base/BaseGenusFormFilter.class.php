<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Genus filter form base class.
 *
 * @package    filters
 * @subpackage Genus *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseGenusFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                => new sfWidgetFormFilterInput(),
      'sub_family_id'       => new sfWidgetFormDoctrineChoice(array('model' => 'SubFamily', 'add_empty' => true)),
      'user_id'             => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'species_count'       => new sfWidgetFormFilterInput(),
      'is_published'        => new sfWidgetFormFilterInput(),
      'first_discovered_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fun_fact'            => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                => new sfValidatorPass(array('required' => false)),
      'sub_family_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'SubFamily', 'column' => 'id')),
      'user_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'species_count'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_published'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'first_discovered_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fun_fact'            => new sfValidatorPass(array('required' => false)),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('genus_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Genus';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'name'                => 'Text',
      'sub_family_id'       => 'ForeignKey',
      'user_id'             => 'ForeignKey',
      'species_count'       => 'Number',
      'is_published'        => 'Number',
      'first_discovered_at' => 'Date',
      'fun_fact'            => 'Text',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}