<?php
/*
if (!isset($_COOKIE['username']))
{
    header('Location: Login.html');
    exit;
}


*/
if($_COOKIE['type'] == "Sponsor")
{
    header('Location: sponsor.php');
    exit;
}

if($_COOKIE['type'] == "admin")
{
    header('Location: admin.php');
    exit;
}


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
      <a class="nav-link" href="Catalog.html">Catalog</a>
      <a class="nav-link" href="DriverOrders.html">Orders</a>
      <a class="nav-link" class="nav" href="SponsorInfo.html">Sponsor Information</a>
      <a class="nav-link" href="earnPoints.html">Earn Points</a>
      <a class="nav-link" href="profile.php">Account</a>

      <div class="logout">
        <form align="right" class="form" method="post" action="http://3.83.252.232:3001/logout">
          <button name="logout" type="submit">Log Out</button>
        </form>
      </div>

      <div class="cart">
        <button id="cart-button"type="button" name="cart" onclick="openForm()"><img id="cart-img" src="images/cart.png" alt="cart icon"></button>
        <form id="cart-form" align="right" class="" action="" method="post">
          <button id="close-button" type="button" name="close-button" onclick="closeForm()">X</button>
          <h3>Shopping Cart</h3><hr>
          <table id="items-table"></table>
          <a id="checkout-button" href="Checkout.html">Checkout</a>
          <button id="clear-button" type="button" name="button">Clear Cart</button>
        </form>
      </div>
    </nav>

    <div class="image">
      <img style="height: 780px;" id="truck" src="images/truck.jpg" alt="truck"/>
      <h1 id="left">Welcome</h1><h1 id="username">!</h1>
      <img id="arrow" src="images/arrow.png" alt="arrow down">
    </div>

    <section id="points-table">
      <h2>Current Points</h2><br>
      <table id="points"></table>
    </section>

    <section id="sponsor-list">
      <h2>Active Sponsorships</h2><br>
      <ul>
        <li>sponsor1</li>
        <li>sponsor2</li>
        <li>sponsor3</li>
      </ul>
    </section>


    <script type="text/javascript">
      function openForm() {
        document.getElementById("cart-form").style.display = "block";
        document.getElementById("cart-button").style.background = "#007BC4";
      }
      function closeForm() {
        document.getElementById("cart-form").style.display = "none";
        document.getElementById("cart-button").style.background = "#444";
      }

    </script>

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


    getURL = "http://3.83.252.232:3001/points/" + getCookie("username", document)
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

      getURL = "http://3.83.252.232:3001/cart/" + getCookie("username", document);
        $.ajax({
                        type: "GET",
                        url: getURL,
                        success: function (data) {
                          for (let i=0; i < data.length; i++) {
                            let info = data[i];
                            resultString = info ["img "] + info["item_name "] + info["qty"] + info["price"];
                          }
                          console.log(resultString);
                          document.getElementById("items").innerHTML = resultString;
                        }
                    });
      </script>


  </body>
</html>
