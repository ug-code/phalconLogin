<?php

use \MyForm\LoginForm;
use \MyForm\RegisterForm;
use MyForm\ChangePasswordForm;
use Phalcon\Tag;
use Phalcon\Mvc\Dispatcher;

class AuthController extends ControllerBase
{
    /*
     * @var LoginForm()
     */
    private $login_form;

    /*
      * @var RegisterForm()
      */
    private $register_form;


    /**
     *
     * @author: Ugunes
     * @date  : 2018.01.06 15:51
     *
     * Phalcona özel contructor
     */
    public function onConstruct()
    {
        $this->login_form    = new LoginForm();
        $this->register_form = new RegisterForm();
    }

    /**
     *
     * @author: Ugunes
     * @date  :2018.01.06 15:51
     *
     * @param $dispatcher
     *
     * Eğer loginse burada işi yoktur.
     *
     * @return \Phalcon\Http\Response|\Phalcon\Http\ResponseInterface
     */
    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {
        if ($this->auth->getIdentity()) {
            return $this->response->redirect('index');

        }
    }

    public function indexAction()
    {
        $this->view->register_form = $this->register_form;
        $this->view->login_form    = $this->login_form;
    }


    /**
     *
     * @author: Ugunes
     * @date  :2018.01.06 15:51
     * @return mixed|\Phalcon\Http\Response|\Phalcon\Http\ResponseInterface
     */
    public function loginAction()
    {
        $form = $this->login_form;
        try {
            if (!$this->request->isPost()) {
                if ($this->auth->hasRememberMe()) {
                    return $this->auth->loginWithRememberMe();
                }
            } else {
                /** @var \MyForm\LoginForm $form */
                if ($form->isValid($this->request->getPost()) == false) {
                    foreach ($form->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                } else {
                    $this->auth->check([
                        'email'    => $this->request->getPost('email'),
                        'password' => $this->request->getPost('password'),
                        'remember' => $this->request->getPost('remember')
                    ]);

                    return $this->response->redirect('index');
                }
            }

        } catch (\Exception $e) {

            $this->flash->error($e->getMessage());

            return $this->response->redirect('auth');
        }

        return $this->response->redirect('auth');
    }

    /**
     *
     * @author: Uğur Güneş
     * @date  :2018.01.06 15:51
     * @return \Phalcon\Http\Response|\Phalcon\Http\ResponseInterface
     */
    public function registerAction()
    {
        /*
         * var RegisterForm()
         */
        $form = $this->register_form;
        try {
            if ($this->request->isPost()) {
                /** @var \MyForm\RegisterForm $form */
                if ($form->isValid($this->request->getPost()) != false) {
                    $req_name  = $this->request->getPost('name', 'striptags');
                    $req_email = $this->request->getPost('email');
                    $req_pass  = $this->request->getPost('password');

                    $user = new \Users([
                        'name'       => $req_name,
                        'email'      => $req_email,
                        'password'   => $this->security->hash($req_pass),
                        'profilesId' => 2
                    ]);

                    if ($user->save()) {
                        $this->flash->success('New user has been created successfully , Sign In');
                        return $this->response->redirect('index');
                    }
                    $this->flash->error($user->getMessages());


                }
            }


        } catch (\Exception $e) {

            $this->flash->error($e->getMessage());

            return $this->response->redirect('auth');
        }

        return $this->response->redirect('auth');

    }



    /**
     *
     * @author: Uğur Güneş
     * @date  :2018.01.06 15:51
     * @return bool|\Phalcon\Http\Response|\Phalcon\Http\ResponseInterface
     *
     * Users must use this action to change its password
     */
    public function changePasswordAction()
    {
        $form = new ChangePasswordForm();

        if ($this->request->isPost()) {

            if (!$form->isValid($this->request->getPost())) {

                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
            } else {


                $user = $this->auth->getUser();

                $oldpass = $this->request->getPost('oldpass');

                $check_oldpass =$this->auth->checkOnlyPassword($user->id,$oldpass);

                if($check_oldpass === false){
                    $this->flash->error("Current password is wrong");
                    return false;

                }

                $user->password           = $this->security->hash($this->request->getPost('password'));
                $user->mustChangePassword = 'N';

                $passwordChange            = new PasswordChanges();
                $passwordChange->user      = $user;
                $passwordChange->ipAddress = $this->request->getClientAddress();
                $passwordChange->userAgent = $this->request->getUserAgent();

                if (!$passwordChange->save()) {
                    $this->flash->error($passwordChange->getMessages());
                } else {

                    $this->flash->success('Your password was successfully changed');

                    Tag::resetInput();
                }
            }
        }

        $this->view->form = $form;

        return $this->response->redirect('index');
    }


}

