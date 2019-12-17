<?php

/**
 * Genus form base class.
 *
 * @package    form
 * @subpackage genus
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseGenusForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'name'                => new sfWidgetFormInput(),
      'sub_family_id'       => new sfWidgetFormDoctrineSelect(array('model' => 'SubFamily', 'add_empty' => false)),
      'user_id'             => new sfWidgetFormDoctrineSelect(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'species_count'       => new sfWidgetFormInput(),
      'is_published'        => new sfWidgetFormInput(),
      'first_discovered_at' => new sfWidgetFormDate(),
      'fun_fact'            => new sfWidgetFormTextarea(),
      'created_at'          => new sfWidgetFormDate(),
      'updated_at'          => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorDoctrineChoice(array('model' => 'Genus', 'column' => 'id', 'required' => false)),
      'name'                => new sfValidatorString(array('max_length' => 255)),
      'sub_family_id'       => new sfValidatorDoctrineChoice(array('model' => 'SubFamily')),
      'user_id'             => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser')),
      'species_count'       => new sfValidatorInteger(),
      'is_published'        => new sfValidatorInteger(),
      'first_discovered_at' => new sfValidatorDate(),
      'fun_fact'            => new sfValidatorString(array('max_length' => 2147483647, 'required' => false)),
      'created_at'          => new sfValidatorDate(array('required' => false)),
      'updated_at'          => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('genus[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Genus';
  }

}