<?php

/**
 * SubFamily form.
 *
 * @package    form
 * @subpackage SubFamily
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class SubFamilyForm extends BaseSubFamilyForm
{
  public function configure()
  {
      $this->widgetSchema['created_at'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['updated_at'] = new sfWidgetFormInputHidden();
      $this->setDefaults(array(
          'created_at' => date('Y-m-d'),
          'updated_at' => date('Y-m-d')
      ));
  }
}
