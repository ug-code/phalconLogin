<?php

use MyForm\ChangePasswordForm;
class IndexController extends ControllerBase
{

    /**
     *
     * @author: Uğur Güneş
     * @date  :2018.01.06 15:51
     *
     * Formu ve validasyonları gönderdik.
     */
    public function indexAction()
    {


        $this->view->form = new ChangePasswordForm();
    }

}

