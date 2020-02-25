<?php
if(isset ($_COOKIE['username']))
 {
   $redirect = "http://3.83.252.232/" . $_COOKIE['type'] . "Profile.html";
   echo($redirect);
   header("Location: $redirect");
}
else
{
   header("Location: Login.html");
}
 ?>

<html>
<head>
</head>
<body>
</body>
</html>
