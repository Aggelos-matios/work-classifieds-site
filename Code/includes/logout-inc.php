<?php
    /**
     * @author George Giantsios AEM 3476
     */

    session_start();
    session_unset();
    session_destroy();

    header("location: ../index.php");
    exit();