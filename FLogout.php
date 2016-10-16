<?php
 @session_start();
 unset ($_SESSION['user_status']);
 unset ($_SESSION['user_id']);
 unset ($_SESSION['user_name']);
 unset ($_SESSION['sem']);
 unset ($_SESSION['branch']);
 session_destroy();
 echo '<h2 style="margin-top:80px;">Thank u visit again</h2><br>';
 echo '<a id="cata" href=FLogin.php />Click here to go to login again</a>';
 ?>