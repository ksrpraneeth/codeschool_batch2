<?php

if(!array_key_exists(email, $_POST) || strlen($_POST['email']) == 0) {
    echo 'Please enter email';
}

if(!array_key_exists(password, $_POST) || strlen($_POST['password']) == 0) {
    echo 'Please enter password';
}

