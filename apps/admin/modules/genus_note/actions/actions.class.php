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

    $this->genus = Doctrine::getTable('Genus');
    $this->users = Doctrine::getTable('sfGuardUser');
    $this->avatars = Doctrine::getTable('UserAvatar');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->genus_note = Doctrine::getTable('GenusNote')->find($request->getParameter('id'));
    $this->genus = Doctrine::getTable('Genus')->find($this->genus_note->getgenus_id());
    $this->user = Doctrine::getTable('sfGuardUser')->find($this->genus_note->getuser_id());
    $this->avatar = Doctrine::getTable('UserAvatar')->find($this->genus_note->getuser_avatar_id());
    $this->forward404Unless($this->genus_note);
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($genus_note = Doctrine::getTable('GenusNote')->find($request->getParameter('id')), sprintf('Object genus_note does not exist (%s).', $request->getParameter('id')));
    $this->form = new GenusNoteForm($genus_note);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($genus_note = Doctrine::getTable('GenusNote')->find($request->getParameter('id')), sprintf('Object genus_note does not exist (%s).', $request->getParameter('id')));
    $this->form = new GenusNoteForm($genus_note);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($genus_note = Doctrine::getTable('GenusNote')->find($request->getParameter('id')), sprintf('Object genus_note does not exist (%s).', $request->getParameter('id')));
    $genus_note->delete();

    $this->redirect('genus_note/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $genus_note = $form->save();

      $this->redirect('genus_note/show?id='.$genus_note['id']);
    }
  }
}
