<?php
/*
if (!isset($_COOKIE['username']))
{
    header('Location: Login.html');
    exit;
}*/
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="index.css">
  </head>
  <body>

    <nav>
      <a class="nav-link" href="#" id="nav-active">Home</a>
      <a class="nav-link" href="AllDrivers.html">Drivers</a>
      <a class="nav-link" href="AllSponsors.html">Sponsors</a>
      <a class="nav-link" href="CompanyList.html">Companies</a>
      <a class="nav-link" href="GenerateReports.html">Reports</a>
      <a class="nav-link" href="AdminProfile.html">Account</a>
      <div class="logout">
        <form align="right" class="form" method="post" action="http://3.83.252.232:3001/logout">
          <button name="logout" type="submit">Log Out</button>
        </form>
      </div>
    </nav>

    <div class="image">
      <img style="height: 780px;" id="truck" src="images/binary.jpg" alt="truck"/>
      <h1 id="left">Welcome</h1><h1 id="username">!</h1>
      <img id="arrow" src="images/arrow.png" alt="arrow down">
    </div>

    <section id="statistics">
      <h2>Number of Drivers </h2>


    </section>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="getCookie.js"></script>
    <script type="text/javascript"charset="utf-8">
  let getURL = "http://3.83.252.232:3001/user/" + getCookie("username");
  $.ajax({
              type: "GET",
              url: getURL,
              success: function (data) {
                data = data[0];
                document.getElementById("username").innerHTML = data["username"];
              }
          });
    </script>

  </body>
</html>
