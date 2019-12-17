<?php

/**
 * sfGuardUser form.
 *
 * @package    form
 * @subpackage sfGuardUser
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class sfGuardUserForm extends PluginsfGuardUserForm
{
  public function configure()
  {
      $this->widgetSchema['algorithm'] = new sfWidgetFormInputHidden();
//      $this->widgetSchema['salt'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['is_active'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['is_super_admin'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['last_login'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['created_at'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['updated_at'] = new sfWidgetFormInputHidden();

  }
}
