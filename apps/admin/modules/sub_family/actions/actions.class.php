<?php

/**
 * sub_family actions.
 *
 * @package    jobeet
 * @subpackage sub_family
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class sub_familyActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $sub_family_list = Doctrine::getTable('SubFamily')
      ->createQuery('a');
    $this->pager = new sfDoctrinePager('SubFamily', sfConfig::get('app_max_notes_per_page'));
    $this->pager->setQuery($sub_family_list);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();

    $this->sub_family_list = $this->pager->getResults();

  }

  public function executeShow(sfWebRequest $request)
  {
    $this->sub_family = Doctrine::getTable('SubFamily')->find($request->getParameter('id'));
    $this->forward404Unless($this->sub_family);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SubFamilyForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new SubFamilyForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($sub_family = Doctrine::getTable('SubFamily')->find($request->getParameter('id')), sprintf('Object sub_family does not exist (%s).', $request->getParameter('id')));
    $sub_family->setupdated_at(date('Y-m-d'));
    $this->form = new SubFamilyForm($sub_family);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($sub_family = Doctrine::getTable('SubFamily')->find($request->getParameter('id')), sprintf('Object sub_family does not exist (%s).', $request->getParameter('id')));

    $this->form = new SubFamilyForm($sub_family);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->forward404Unless($sub_family = Doctrine::getTable('SubFamily')->find($request->getParameter('id')), sprintf('Object sub_family does not exist (%s).', $request->getParameter('id')));
    $genus = Doctrine::getTable('Genus')->createQuery('g')->where('g.sub_family_id = ?', $sub_family->getid())->execute();
    if ($genus) {
        foreach ($genus as $genu) {
            $notes = Doctrine::getTable('GenusNote')->createQuery('n')->where('n.genus_id = ?', $genu->getid())->execute();
            $notes->delete();
        }
        $genus->delete();
    }

      $sub_family->delete();

    $this->redirect('sub_family/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $sub_family = $form->save();

      $this->redirect('sub_family/show?id='.$sub_family['id']);
    }
  }
}
