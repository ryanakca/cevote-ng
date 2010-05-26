<?php
    $session->flash('auth');
    echo $form->create('User', array('action' => 'login', 'admin'=>true));
    echo $form->input('username');
    echo $form->input('password');
    echo $form->end('Login');
?>
