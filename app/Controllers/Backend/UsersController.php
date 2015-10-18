<?php

namespace PhalconCart\Controllers\Backend;

use PhalconCart\Models\User;
use PhalconCart\Forms\Backend\UserForm;


class UsersController extends AbstractBackendController
{
  public function indexAction()
  {

  }

  public function newAction()
  {
  }

  public function createAction()
  {
    $form = new UserForm(new User);
    if ($this->request->isPost()) {
      if(!$form->isValid($this->request->getPost()) {
        // TODO error
      }

      // Build Service
      $service = form->buildService();
      if(!$service->execute()) {

      } else {

      }
    }

    $this->view->form = new UserForm(new User);
  }
}