<?php

    session_start();
    unset($_SESSION["memberID"]);
    header("Location: ../index.html");

?>