<?php

if (!isset($_COOKIE['username']))
{
    header('Location: Login.html');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Driver Incentive Program</title>
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <nav>
      <input type="text" name="search" placeholder=" Search...">
      <a href="../Login-out/login.html">Sign In</a>
      <a href="profile.php">Account</a>
    </nav>


      <section id="title-container">
        <h1 id="top">Welcome to the</h1>
        <h1 id="bottom">Good Driver</h1>
        <h1>Incentive</h1>
        <h1>Program</h1>
      </section>

      <section class="main-content" id="message-container">
        <p>Welcome to the Good Driver Incentive Program...</p>
        <a class="button" href="../Login-out/signup.html">Get Started</a>
      </section>






  </body>
</html>
