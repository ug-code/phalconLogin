<!DOCTYPE html><!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]--><!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]--><!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title> Example | User Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="/assets/pages/css/login-2.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
    <style>
        body.login {
            background: #061023c7;
        }
        .create-account > p > #register-btn {
            background-color: #5bb75b;
            border: none;
        }
    </style>
</head>
<!-- END HEAD -->
<body class=" login">
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <?= $this->tag->form(['class' => 'login-form', 'action' => 'auth/login', 'style' => 'margin-top: 130px;']) ?>
    <?= $login_form->render('csrf', ['value' => $this->security->getToken()]) ?>

    <div id='messages'><?= $this->flash->output() ?></div>
    <div class="form-title">
        <span class="form-title">Welcome.</span> <span class="form-subtitle">Please login.</span>
    </div>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span> Enter email and password. </span>
    </div>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <?= $login_form->render('email') ?>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <?= $login_form->render('password') ?>
    </div>
    <div class="form-actions">
        <?= $login_form->render('go') ?>
    </div>
    <div class="form-actions">
        <div class="pull-left">
            <label class="rememberme mt-checkbox mt-checkbox-outline">
                <?= $login_form->render('remember') ?> Remember me <span></span> </label>
        </div>
    </div>
    <div class="create-account">
        <p>
            <a href="javascript:;" class="btn-primary btn" id="register-btn">Create an account</a>
        </p>
    </div>
    <?= $this->tag->endForm() ?>
    <!-- END LOGIN FORM -->
    <!-- BEGIN REGISTRATION FORM -->
    <?= $this->tag->form(['class' => 'register-form', 'action' => 'auth/register']) ?>
    <?= $register_form->render('csrf', ['value' => $this->security->getToken()]) ?>
    <div id='messages'>
        <?php print_r($this->flash->output()); ?>
    </div>
    <div class="form-title">
        <span class="form-title">Sign Up</span>
    </div>
    <p class="hint"> Enter your personal details below: </p>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Name</label>
        <?= $register_form->render('name') ?>
    </div>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <?= $register_form->render('email') ?>
    </div>

    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>

        <?= $register_form->render('password') ?>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
        <?= $register_form->render('confirmPassword') ?>
    </div>
    <div class="form-group margin-top-20 margin-bottom-20">
        <label class="mt-checkbox mt-checkbox-outline">

            <?= $register_form->render('terms') ?>  I agree to the
            <input type="checkbox" name="tnc"/>
            <a href="javascript:;">Terms of Service </a> & <a href="javascript:;">Privacy Policy </a> <span></span>
        </label>
        <div id="register_tnc_error"></div>
    </div>
    <div class="form-actions">
        <button type="button" id="register-back-btn" class="btn btn-default">Back</button>
        <button type="submit" id="register-submit-btn" class="btn red uppercase pull-right">Submit</button>
    </div>
    <?= $this->tag->endForm() ?>
    <!-- END REGISTRATION FORM -->
</div>
<div class="copyright hide">Login Page.</div>
<!-- END LOGIN --><!--[if lt IE 9]>
<script src="/assets/global/plugins/respond.min.js"></script>
<script src="/assets/global/plugins/excanvas.min.js"></script>
<script src="/assets/global/plugins/ie8.fix.min.js"></script><![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>