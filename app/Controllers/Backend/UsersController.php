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
    $this->view->form = new UserForm(null, ['edit' => true]);
  }
}