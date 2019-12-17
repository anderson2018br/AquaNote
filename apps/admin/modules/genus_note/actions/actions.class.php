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
    $this->genus_note_list = Doctrine::getTable('GenusNote')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->genus_note = Doctrine::getTable('GenusNote')->find($request->getParameter('id'));
    $this->forward404Unless($this->genus_note);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new GenusNoteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new GenusNoteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
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

      $this->redirect('genus_note/edit?id='.$genus_note['id']);
    }
  }
}
