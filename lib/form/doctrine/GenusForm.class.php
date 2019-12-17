<?php

/**
 * Genus form.
 *
 * @package    form
 * @subpackage Genus
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class GenusForm extends BaseGenusForm
{
  public function configure()
  {
      $this->widgetSchema['created_at'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['updated_at'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['is_published'] = new sfWidgetFormChoice(array(
          'choices' => array(
              1 => 'Yes',
              0 => 'No'
          )
      ));

      $this->setDefaults(array(
          'first_discovered_at' => date('Y-m-d'),
          'created_at' => date('Y-m-d'),
          'updated_at' => date('Y-m-d')
      ));
      $year = range(date('Y') - 2000, date('Y'));
      $this->widgetSchema['first_discovered_at'] = new sfWidgetFormDate(array(
          'years' => array_combine($year, $year)
      ));
  }
}
