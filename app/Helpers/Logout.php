<?php

namespace App\Helpers;

    session_start();
    unset( $_SESSION["usuario"] );
    header("Location: ../../index.php");