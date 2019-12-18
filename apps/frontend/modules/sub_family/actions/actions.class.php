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
        $sub_family_list = Doctrine::getTable('SubFamily')->createQuery('a');
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
}
