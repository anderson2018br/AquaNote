<?php

/**
 * genus_note actions.
 *
 * @package    jobeet
 * @subpackage genus_note
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class genus_noteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $genus_note_list = Doctrine::getTable('GenusNote')
      ->createQuery('a');
    $this->pager = new sfDoctrinePager('GenusNote', sfConfig::get('app_max_notes_per_page'));
    $this->pager->setQuery($genus_note_list);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();

    $this->genus_note_list = $this->pager->getResults();
    $this->users = Doctrine::getTable('sfGuardUser');
    $this->genus = Doctrine::getTable('Genus');
    $this->avatars = Doctrine::getTable('UserAvatar');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->genus_note = Doctrine::getTable('GenusNote')->find($request->getParameter('id'));
    $this->forward404Unless($this->genus_note);
    $this->user = Doctrine::getTable('sfGuardUser')->find($this->genus_note->getuser_id());
    $this->genus = Doctrine::getTable('Genus')->find($this->genus_note->getgenus_id());
    $this->avatar = Doctrine::getTable('UserAvatar')->createQuery('a')->where('a.user_id = ?', $this->user->getid())->execute();

  }

}
