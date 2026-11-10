<?php

    unset($_SESSION['user']);
    header('Location:?route=login');
    exit();

?>