<?php
session_start();
session_destroy(); // end the session
header("Location: login.html"); // send back to login page
exit();
?>