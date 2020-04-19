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
    <title>Dashboard</title>
    <link rel="stylesheet" href="index.css">
  </head>
  <body>

    <nav>
      <a href="#" class="active">Home</a>
      <a href="Catalog.html">Catalog</a>
      <a href="CompanyInfo.html">Company Info</a>
      <a href="Sponsors.html">Sponsors</a>
      <a href="ManagerProfile.html">Account</a>
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

    <h1>Welcome</h1> <h1 id="first"></h1>

    <section id="statistics">
      <h2>Current number of sponsors</h2>
      <p id="sponsors">[number]</p>
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
                document.getElementById("first").innerHTML = data["first"];
              }
          });
    getURL = "http://3.83.252.232:3001/user/sponsor/" + document.getElementById("company").innerHTML;
    $.ajax({
        type: "GET",
        url: getURL,
        success: function (data) {
            let num = 0;
                for(let i=0; i<data.length; i++){
                      let info  = data[i];
                      num += 1;
                }
            document.getElementById("sponsors").innerHTML = num;
        }
    });
    </script>

  </body>
</html>
