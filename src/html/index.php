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
	 <style>
    .logout button {
      position:fixed;
      right: 0px;
      top: 0px;
      background-color: #444;
      color: white;
      border: 0;
      font-size: 10px;
      font-weight: bold;
      font-family: inherit;
      padding: 12px;
    }

    .logout button:hover {
      background: #007BC4;
      color: #444;
      cursor: pointer;
    }
    </style>
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <nav>
      <input type="text" name="search" placeholder=" Search...">
      <a href="#" class="active">Home</a>
      <a href="Catalog.html">Catalog</a>
      <a href="DriverOrders.html">Orders</a>
      <a href="SponsorInfo.html">Sponsor Information</a>
      <a href="profile.php">Account</a>
	<div class="logout">
        <form align="right" class="form" method="post" action="http://3.83.252.232:3001/logout">
          <button name="logout" type="submit">Log Out</button>
        </form>
      	</div>
    </nav>


    <h2>Welcome </h2> <h2 id="username">!</h2><br>

    <section id="points-table">
      <h2>Current Points</h2><br>
      <table id="points"></table>
    </section>

    <section id="sponsor-list">
      <h2>Active Sponsorships</h2><br>
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


    getURL = "http://3.83.252.232:3001/user/" + getCookie("username", document)
    $.ajax({
                type: "GET",
                url: getURL,
                success: function (data) {
                  let resultString = "<tr><th>Sponsor</th><th>Points</th></tr>";
                  for(let i=0; i<data.length; i++){
                    let info  = data[i];
				            resultString = resultString + "<tr><td>" + info["sponsor"] + "</td><td>" + info["points"] + "</td></tr>";
		              }
		               console.log(resultString);
		               document.getElementById("points").innerHTML = resultString;
                }
            });
      </script>


  </body>
</html>
