<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * UserAvatar filter form base class.
 *
 * @package    filters
 * @subpackage UserAvatar *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseUserAvatarFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'file_name' => new sfWidgetFormFilterInput(),
      'user_id'   => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'file_name' => new sfValidatorPass(array('required' => false)),
      'user_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('user_avatar_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserAvatar';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'file_name' => 'Text',
      'user_id'   => 'ForeignKey',
    );
  }
}