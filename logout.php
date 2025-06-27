<?php
session_start();
session_destroy();
header("Location: login.php?exito=Has cerrado sesión");
exit;
