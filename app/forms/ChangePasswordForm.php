<?php

namespace MyForm;

use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\Identical;

class ChangePasswordForm extends Form
{

    public function initialize()
    {

        // Password
        $oldpass = new Password('oldpass', [
            'class' => 'form-control'
        ]);

        $oldpass->addValidators([
            new PresenceOf([
                'message' => 'Current Password is required'
            ])
        ]);

        $this->add($oldpass);

        // Password
        $password = new Password('password', [
            'id' => 'register_password',
            'class' => 'form-control'
        ]);

        $password->addValidators([
            new PresenceOf([
                'message' => 'Password is required'
            ]),
            new StringLength([
                'min'            => 8,
                'messageMinimum' => 'Password is too short. Minimum 8 characters'
            ]),
            new Confirmation([
                'message' => 'Password doesn\'t match confirmation',
                'with'    => 'confirmPassword'
            ])
        ]);

        $this->add($password);

        // Confirm Password
        $confirmPassword = new Password('confirmPassword', [

            'class' => 'form-control'
        ]);

        $confirmPassword->addValidators([
            new PresenceOf([
                'message' => 'The confirmation password is required'
            ])
        ]);

        $this->add($confirmPassword);


        $csrf = new Hidden('csrf');

        $csrf->addValidator(new Identical([
            'value' => $this->security->getSessionToken(),
            'message' => 'CSRF validation failed'
        ]));

        $csrf->clear();

        $this->add($csrf);
    }
}
