<?php
$config = array();

$config['emailConfig'] = array(
    'firstname' => 'PPI',
    'lastname'  => 'Mailer',
    'email'     => 'noreply@ppi.io'
);

$config['signupEmail'] = array(
    'subject' => 'Activate your new account'
);

$config['forgotEmail'] = array(
    'subject' => 'Request your new password'
);

$config['authSalt'] = 'x84r7dtsjkbsdf';

return $config;
