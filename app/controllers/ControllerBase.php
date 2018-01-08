<?php

use Library\Auth\Auth;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;


/**
 * Class ControllerBase
 * @property \Library\Auth\Auth auth
 */
class ControllerBase extends Controller
{


    /**
     *
     * @author: Ugunes
     * @date  :2018.01.06 15:51
     *
     * Contructor
     *
     * public function onConstruct(){
     * // $this->auth = new Auth;
     * // $this->view->disable();
     *
     * if (!$this->session->get('auth-identity')) {
     * $this->flash->error("you must be logged in to access this area");
     *
     *
     * }
     * }  */

    /**
     *
     * @author: Ugunes
     * @date  :2018.01.06 15:51
     *
     * @param $dispatcher
     *
     * Login işlemi zorunlu kılmak.
     *
     * Eğer login olunmadıysa ve login sayfasında değil ise login sayfasına yönlendirilir.
     * @return bool
     */
    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {
        if (!$this->auth->getIdentity()) {
            if ($dispatcher->getControllerName() != 'auth') {
                $dispatcher->forward([
                    'controller' => 'auth',
                    'action'     => 'index'
                ]);

                return false;
            }

        }


    }

}
