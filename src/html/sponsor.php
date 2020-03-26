
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
    <title>Sponsor Profile</title>
    <link rel="stylesheet" href="index.css">
  </head>
  <body>

    <nav>
      <a href="#" class="active">Home</a>
      <a href="Catalog.html">Catalog</a>
      <a href="CompanyInfo.html">Company Info</a>
      <a href="SponsorDrivers.html">Drivers</a>
      <a href="SponsorProfile.html">Account</a>
    </nav>

    <h1>Welcome</h1> <h1 id="username"></h1>

    <section id="statistics">
      <h2>Current number of drivers</h2>


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
