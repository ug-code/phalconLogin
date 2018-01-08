<?php

use \MyForm\LoginForm;

class LogoutController extends ControllerBase
{

    /**
     *
     * @author: Uğur Güneş
     * @date  :2018.01.06 15:51
     * @return \Phalcon\Http\Response|\Phalcon\Http\ResponseInterface
     *
     * Çıkış yapıldı auth dosyasında da yapılabilirdi ama burada yaptım.
     */
    public function indexAction()
    {
        $this->auth->remove();

        return $this->response->redirect('index');

    }


}

