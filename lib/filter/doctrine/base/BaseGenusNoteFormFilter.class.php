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
      'genus_id'       => new sfWidgetFormDoctrineChoice(array('model' => 'Genus', 'add_empty' => true)),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'user_avatar_id' => new sfWidgetFormDoctrineChoice(array('model' => 'UserAvatar', 'add_empty' => true)),
      'note'           => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'genus_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Genus', 'column' => 'id')),
      'user_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'user_avatar_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'UserAvatar', 'column' => 'id')),
      'note'           => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
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
      'id'             => 'Number',
      'genus_id'       => 'ForeignKey',
      'user_id'        => 'ForeignKey',
      'user_avatar_id' => 'ForeignKey',
      'note'           => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}