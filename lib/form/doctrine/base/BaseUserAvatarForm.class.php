<?php

/**
 * UserAvatar form base class.
 *
 * @package    form
 * @subpackage user_avatar
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseUserAvatarForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'file_name' => new sfWidgetFormInput(),
      'user_id'   => new sfWidgetFormDoctrineSelect(array('model' => 'sfGuardUser', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorDoctrineChoice(array('model' => 'UserAvatar', 'column' => 'id', 'required' => false)),
      'file_name' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'user_id'   => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser')),
    ));

    $this->widgetSchema->setNameFormat('user_avatar[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserAvatar';
  }

}