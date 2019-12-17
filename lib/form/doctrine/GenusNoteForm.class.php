<?php

/**
 * GenusNote form.
 *
 * @package    form
 * @subpackage GenusNote
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class GenusNoteForm extends BaseGenusNoteForm
{
  public function configure()
  {
      $this->widgetSchema['updated_at'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['created_at'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['genus_id'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['username'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['user_avatar_filename'] = new sfWidgetFormChoice(array(
          'choices' =>  array(
                'leanna.jpeg' => 'Leanna',
                'ryan.jpeg' => 'Ryan'
          )
      ));
      $this->setDefaults(array(
         'updated_at' => date('m-d-Y'),
         'created_at' => date('Y-m-d')
      ));
  }
}
