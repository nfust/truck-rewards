<?php
/*
if (!isset($_COOKIE['username']))
{
    header('Location: Login.html');
    exit;
}

*/
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

      <div class="cart">
        <button id="cart-button"type="button" name="cart" onclick="openForm()"><img id="cart-img" src="images/cart.png" alt="cart icon"></button>
        <form id="cart-form" align="right" class="" action="" method="post">
          <button id="close-button" type="button" name="close-button" onclick="closeForm()">X</button>
          <h3>Shopping Cart</h3><hr>
          <p>item1</p>
          <p>item2</p>
          <p>item3</p>
        </form>
      </div>
    </nav>


    <h1>Welcome </h1> <h1 id="username"></h1>

    <section id="points-table">
      <h2>Current Points</h2><br>
      <table id="points"></table>
    </section>

    <section id="sponsor-list">
      <h2>Active Sponsorships</h2><br>
    </section>



    <script type="text/javascript">
      function openForm() {
        document.getElementById("cart-form").style.display = "block";
      }
      function closeForm() {
        document.getElementById("cart-form").style.display = "none";
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
