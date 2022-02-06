<?php
    require_once "../libs/login/scripts/0.php";
    session_start();
    session_unset();
    header("Location: https://$domain_dziennik/");
