<?php

/**
 * GenusNote form base class.
 *
 * @package    form
 * @subpackage genus_note
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseGenusNoteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'genus_id'   => new sfWidgetFormDoctrineSelect(array('model' => 'Genus', 'add_empty' => false)),
      'user_id'    => new sfWidgetFormDoctrineSelect(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'note'       => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDate(),
      'updated_at' => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => 'GenusNote', 'column' => 'id', 'required' => false)),
      'genus_id'   => new sfValidatorDoctrineChoice(array('model' => 'Genus')),
      'user_id'    => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'note'       => new sfValidatorString(array('max_length' => 2147483647, 'required' => false)),
      'created_at' => new sfValidatorDate(array('required' => false)),
      'updated_at' => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('genus_note[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GenusNote';
  }

}