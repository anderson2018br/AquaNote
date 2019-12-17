<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * GenusNote filter form base class.
 *
 * @package    filters
 * @subpackage GenusNote *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseGenusNoteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'genus_id'             => new sfWidgetFormDoctrineChoice(array('model' => 'Genus', 'add_empty' => true)),
      'username'             => new sfWidgetFormFilterInput(),
      'user_avatar_filename' => new sfWidgetFormFilterInput(),
      'note'                 => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'genus_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Genus', 'column' => 'id')),
      'username'             => new sfValidatorPass(array('required' => false)),
      'user_avatar_filename' => new sfValidatorPass(array('required' => false)),
      'note'                 => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('genus_note_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GenusNote';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'genus_id'             => 'ForeignKey',
      'username'             => 'Text',
      'user_avatar_filename' => 'Text',
      'note'                 => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
    );
  }
}