<?php
require 'config.php';
session_unset();
session_destroy();
header("Location: login_men.php");
?>