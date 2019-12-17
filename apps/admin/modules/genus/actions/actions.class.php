<?php

/**
 * genus actions.
 *
 * @package    jobeet
 * @subpackage genus
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class genusActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {

  }

    /**
     * @param sfWebRequest $request
     * @noinspection PhpUnused
     */
  public function executeList(sfWebRequest $request)
  {
      $genus_list = Doctrine::getTable('Genus')
          ->createQuery('a');
      $this->pager = new sfDoctrinePager('Genus', sfConfig::get('app_max_per_page'));
      $this->pager->setQuery($genus_list);
      $this->pager->setPage($request->getParameter('page', 1));
      $this->pager->init();
      $this->genus_list = $this->pager->getResults();

      $this->sub_families = Doctrine::getTable('SubFamily');
      $this->users = Doctrine::getTable('sfGuardUser');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->genus = Doctrine::getTable('Genus')->find($request->getParameter('id'));
    $this->sub_family = Doctrine::getTable('SubFamily')->find($this->genus->getsub_family_id());
    $this->user = Doctrine::getTable('sfGuardUser')->find($this->genus->getuser_id());
    $this->users = Doctrine::getTable('sfGuardUser')->findAll();

    $this->forward404Unless($this->genus);
    $this->form = new GenusNoteForm();
    $this->form->setDefaults(array(
       'genus_id' => $this->genus->getid(),
       'updated_at' => date('Y-m-d'),
       'created_at' => date('Y-m-d')
    ));
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new GenusForm();
    $this->user = Doctrine::getTable('sfGuardUser')->findAll();

  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new GenusForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($genus = Doctrine::getTable('Genus')->find($request->getParameter('id')), sprintf('Object genus does not exist (%s).', $request->getParameter('id')));
    $this->form = new GenusForm($genus);
    $this->user = Doctrine::getTable('sfGuardUser')->findAll();
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($genus = Doctrine::getTable('Genus')->find($request->getParameter('id')), sprintf('Object genus does not exist (%s).', $request->getParameter('id')));
    $this->form = new GenusForm($genus);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($genus = Doctrine::getTable('Genus')->find($request->getParameter('id')), sprintf('Object genus does not exist (%s).', $request->getParameter('id')));
    $notes = Doctrine::getTable('GenusNote')->createQuery('n')->where('n.genus_id = ?',$genus->getid())->execute();
    if ($notes) {
        $notes->delete();
    }

    $genus->delete();

    $this->redirect('genus/list');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $genus = $form->save();

      $this->redirect('genus/show?id='.$genus['id']);
    }
  }
  public function executeCreateNotes(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new GenusNoteForm();

    $this->processNoteForm($request, $this->form);

    $this->setTemplate('show');
  }

  protected function processNoteForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()));
      if ($form->isValid())
      {
          $note = $form->save();

          $this->redirect('genus/show?id='.$note['genus_id']);      }
  }
}
