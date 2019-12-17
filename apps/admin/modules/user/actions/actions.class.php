<?php

/**
 * user actions.
 *
 * @package    jobeet
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class userActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->sf_guard_user_list = Doctrine::getTable('sfGuardUser')
      ->createQuery('a')
      ->execute();
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($sf_guard_user = Doctrine::getTable('sfGuardUser')->find($request->getParameter('id')), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
    $avatar = Doctrine::getTable('UserAvatar')->createQuery('a')->where('a.user_id = ?', $sf_guard_user->getid())->execute();
    if ($avatar){
        $avatar->delete();
    }
    $notes = Doctrine::getTable('GenusNote')->createQuery('n')->where('n.user_id = ?', $sf_guard_user->getid())->execute();
    if ($notes) {
        $notes->delete();
    }
    $genus = Doctrine::getTable('Genus')->createQuery('g')->where('g.user_id = ?', $sf_guard_user->getid())->execute();
    if ($genus) {
        foreach ($genus as $genu) {
            $note = Doctrine::getTable('GenusNote')->createQuery('n')->where('n.genus_id = ?', $genu->getid())->execute();
            if ($note) {
                $note->delete();
            }
        }
        $genus->delete();
    }
    $sf_guard_user->delete();

    $this->redirect('user/index');
  }
}
