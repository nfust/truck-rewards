<?php 
if (isset($_COOKIE['username']))
{
   $username = $_COOKIE['username'];
}
else
{
   header("Location: Login.html");
}
if (isset($_GET['sponsor']))
{
   $sponsor = $_GET['sponsor'];
}
else
{
   header("Location: CatalogSponsor.html");
}


if ($_GET['search'] && $_GET['sort'])
	$command = escapeshellcmd('python3 findbykeywords.py \"'.$_GET['search'].'\" '.$_GET['sort']);

elseif ($_GET['search'])
	$command = escapeshellcmd('python3 findbykeywords.py '.$_GET['search']);
else
	$command = escapeshellcmd('python3 findbykeywords.py "bumper sticker"');
$output = json_decode(shell_exec($command));

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <style>
      img {
        margin-top: 1%;
        height: 10%;
        width: 10%;
      }

      p{display: inline}
<<<<<<< HEAD

      table{border:1px;}

=======

>>>>>>> 8372600e0e757ab5e4317ec9b6e9cc72593ecfb8
    </style>
   
    <link rel="stylesheet" href="catalog.css">

    <title>Catalog</title>
  </head>
  <body>
	
    <nav>
      <form class="search" action="/Catalog.php" enctype="multipart/form-data">
      <label for="sort" style = color:#FFFFFF >Search Type:</label>

      <select id="sort" name = "sort">
      <option value="BestMatch">Best Match</option>
      <option value="PricePlusShippingHighest">High to Low</option>
      <option value="PricePlusShippingLowest">Low to High</option>
      </select> 
      <input type="text" placeholder="Explore the Catalog.." name="search">
	<input type = "text"READONLY value =  "<?php echo $sponsor; ?>" name = "sponsor">
      <input type="submit" value="Submit">
      </form>
	<!--<a href="catalog.html"><?php echo $output->{'9URL'}; ?></a>-->
	<a href="index.php">Home</a>
      <a href="Catalog.php" class="active">Catalog</a>
      <a href="DriverOrders.html">Orders</a>
      <a href="SponsorInfo.html">Sponsor Information</a>
      <a href="earnPoints.html">Earn Points</a>
      <a href="DriverProfile.html" >Account</a>

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
          <table id="items-table" style="overflow-y:scroll;height:145px;display:block;">
	  </table>
          <a id="checkout-button" href="Checkout.html">Checkout</a>
          <a id="clear-button" href="http://3.83.252.232:3001/clearCart">Clear Cart</a>
          </form>
        </form>
      </div>



    </nav>
</head>

<br><br><br><br><br>

<ul class="products"> <item>
        <img src= "<?php echo $output->{'0URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'0title'}; ?></h4>
            <p><?php echo $output->{'0price'}; ?> Points </p>
        </a>
        <form class="form" action="http://3.83.252.232:3001/addCart" method="post" >
        <label for="item_name">Item Name</label>
      <input id="item_name" type="text"READONLY name="item_name" value="<?php echo $output->{'0title'}; ?>"><br/>
        <label for="qty">How many would you like?</label>
      <input id="qty" type="int" name="qty" value="1"><br/>
        <label for="points">Cost</label>
        <input id="points" type="int"READONLY name="points" value="<?php echo $output->{'0price'}; ?>">
	<input id="sponsor" type="hidden" name="sponsor" value="">
      <button id="submit" type="submit" name="save">Add To Cart</button>
        </form>
    </item>

<item>
        <img src= "<?php echo $output->{'1URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'1title'}; ?></h4>
            <p><?php echo $output->{'1price'}; ?> Points </p>
        </a>
        <form class="form" action="http://3.83.252.232:3001/addCart" method="post" >
        <label for="item_name">Item Name</label>
      <input id="item_name" type="text"READONLY name="item_name" value="<?php echo $output->{'1title'}; ?>"><br/>
        <label for="qty">How many would you like?</label>
      <input id="qty" type="int" name="qty" value="1"><br/>
        <label for="points">Cost</label>
        <input id="1points" type="int"READONLY name="points" value="<?php echo $output->{'1price'}; ?>">
	<input id="sponsor" type="hidden" name="sponsor" value="">
        <input id="driver" type="hidden" name="driver" value="">
      <button id="submit" type="submit" name="save">Add To Cart</button>
        </form>
    </item>
<item>
        <img src= "<?php echo $output->{'2URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'2title'}; ?></h4>
            <p><?php echo $output->{'2price'}; ?> Points </p>
        </a>
        <form class="form" action="http://3.83.252.232:3001/addCart" method="post" >
        <label for="item_name">Item Name</label>
      <input id="item_name" type="text"READONLY name="item_name" value="<?php echo $output->{'2title'}; ?>"><br/>
        <label for="qty">How many would you like?</label>
      <input id="qty" type="int" name="qty" value="1"><br/>
        <label for="points">Cost</label>
        <input id="2points" type="int"READONLY name="points" value="<?php echo $output->{'2price'}; ?>">
	<input id="sponsor" type="hidden" name="sponsor" value="">
        <input id="driver" type="hidden" name="driver" value="">
      <button id="submit" type="submit" name="save">Add To Cart</button>
        </form>
    </item><item>
        <img src= "<?php echo $output->{'3URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'3title'}; ?></h4>
            <p><?php echo $output->{'3price'}; ?> Points </p>
        </a>
        <form class="form" action="http://3.83.252.232:3001/addCart" method="post" >
        <label for="item_name">Item Name</label>
      <input id="item_name" type="text"READONLY name="item_name" value="<?php echo $output->{'3title'}; ?>"><br/>
        <label for="qty">How many would you like?</label>
      <input id="qty" type="int" name="qty" value="1"><br/>
        <label for="points">Cost</label>
        <input id="3points" type="int"READONLY name="points" value="<?php echo $output->{'3price'}; ?>">
	<input id="sponsor" type="hidden" name="sponsor" value="">
        <input id="driver" type="hidden" name="driver" value="">
      <button id="submit" type="submit" name="save">Add To Cart</button>
        </form>
    </item><item>
        <img src= "<?php echo $output->{'4URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'4title'}; ?></h4>
            <p><?php echo $output->{'4price'}; ?> Points </p>
        </a>
        <form class="form" action="http://3.83.252.232:3001/addCart" method="post" >
        <label for="item_name">Item Name</label>
      <input id="item_name" type="text"READONLY name="item_name" value="<?php echo $output->{'4title'}; ?>"><br/>
        <label for="qty">How many would you like?</label>
      <input id="qty" type="int" name="qty" value="1"><br/>
        <label for="points">Cost</label>
        <input id="4points" type="int"READONLY name="points" value="<?php echo $output->{'4price'}; ?>">
	<input id="sponsor" type="hidden" name="sponsor" value="">
        <input id="driver" type="hidden" name="driver" value="">
      <button id="submit" type="submit" name="save">Add To Cart</button>
        </form>
    </item><item>
        <img src= "<?php echo $output->{'5URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'5title'}; ?></h4>
            <p><?php echo $output->{'5price'}; ?> Points </p>
        </a>
        <form class="form" action="http://3.83.252.232:3001/addCart" method="post" >
        <label for="item_name">Item Name</label>
      <input id="item_name" type="text"READONLY name="item_name" value="<?php echo $output->{'5title'}; ?>"><br/>
        <label for="qty">How many would you like?</label>
      <input id="qty" type="int" name="qty" value="1"><br/>
        <label for="points">Cost</label>
        <input id="5points" type="int"READONLY name="points" value="<?php echo $output->{'5price'}; ?>">
	<input id="sponsor" type="hidden" name="sponsor" value="">
        <input id="driver" type="hidden" name="driver" value="">
      <button id="submit" type="submit" name="save">Add To Cart</button>
        </form>
    </item><item>
        <img src= "<?php echo $output->{'6URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'6title'}; ?></h4>
            <p><?php echo $output->{'6price'}; ?> Points </p>
        </a>
        <form class="form" action="http://3.83.252.232:3001/addCart" method="post" >
        <label for="item_name">Item Name</label>
      <input id="item_name" type="text"READONLY name="item_name" value="<?php echo $output->{'6title'}; ?>"><br/>
        <label for="qty">How many would you like?</label>
      <input id="qty" type="int" name="qty" value="1"><br/>
        <label for="points">Cost</label>
        <input id="6points" type="int"READONLY name="points" value="<?php echo $output->{'6price'}; ?>">
	<input id="sponsor" type="hidden" name="sponsor" value="">
        <input id="driver" type="hidden" name="driver" value=""> 
     <button id="submit" type="submit" name="save">Add To Cart</button>
        </form>
    </item><item>
        <img src= "<?php echo $output->{'7URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'7title'}; ?></h4>
            <p><?php echo $output->{'7price'}; ?> Points </p>
        </a>
        <form class="form" action="http://3.83.252.232:3001/addCart" method="post" >
        <label for="item_name">Item Name</label>
      <input id="item_name" type="text"READONLY name="item_name" value="<?php echo $output->{'7title'}; ?>"><br/>
        <label for="qty">How many would you like?</label>
      <input id="qty" type="int" name="qty" value="1"><br/>
        <label for="points">Cost</label>
        <input id="7points" type="int"READONLY name="points" value="<?php echo $output->{'7price'}; ?>">
	<input id="sponsor" type="hidden" name="sponsor" value="">
        <input id="driver" type="hidden" name="driver" value="">
	<button id="submit" type="submit" name="save">Add To Cart</button>
        </form>
    </item><item>
        <img src= "<?php echo $output->{'8URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'8title'}; ?></h4>
            <p><?php echo $output->{'8price'}; ?> Points </p>
        </a>
        <form class="form" action="http://3.83.252.232:3001/addCart" method="post" >
        <label for="item_name">Item Name</label>
      <input id="item_name" type="text"READONLY name="item_name" value="<?php echo $output->{'8title'}; ?>"><br/>
        <label for="qty">How many would you like?</label>
      <input id="qty" type="int" name="qty" value="1"><br/>
        <label for="points">Cost</label>
        <input id="8points" type="int"READONLY name="points" value="<?php echo $output->{'8price'}; ?>">
	<input id="sponsor" type="hidden" name="sponsor" value="">
        <input id="driver" type="hidden" name="driver" value="">
      <button id="submit" type="submit" name="save">Add To Cart</button>
        </form>
    </item><item>
        <img src= "<?php echo $output->{'9URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'9title'}; ?></h4>
            <p><?php echo $output->{'9price'}; ?> Points </p>
        </a>
        <form class="form" action="http://3.83.252.232:3001/addCart" method="post" >
        <label for="item_name">Item Name</label>
      <input id="item_name" type="text"READONLY name="item_name" value="<?php echo $output->{'9title'}; ?>"><br/>
        <label for="qty">How many would you like?</label>
      <input id="qty" type="int" name="qty" value="1"><br/>
        <label for="points">Cost</label>
        <input id="9points" type="int"READONLY name="points" value="<?php echo $output->{'9price'}; ?>">
	<input id="sponsor" type="hidden" name="sponsor" value="">
	<input id="driver" type="hidden" name="driver" value="">
      <button id="submit" type="submit" name="save">Add To Cart</button>
        </form>
    </item>
</ul>


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
    <script type="text/javascript"charset="utf-8">
    const queryParamsString = window.location.search.substr(1);
    console.log(queryParamsString);
    const queryParams = queryParamsString.split('&').reduce((accumulator, singleQueryParam) => {
        const [key, value] = singleQueryParam.split('=');
        accumulator[key] = value;
        return accumulator;
        }, {})
    console.log(queryParams.sponsor);

    let pointval = <?php echo $output->{'0price'}; ?>;
let pointval1 = <?php echo $output->{'1price'}; ?>;
let pointval2 = <?php echo $output->{'2price'}; ?>;
let pointval3 = <?php echo $output->{'3price'}; ?>;
let pointval4 = <?php echo $output->{'4price'}; ?>;
let pointval5 = <?php echo $output->{'5price'}; ?>;
let pointval6 = <?php echo $output->{'6price'}; ?>;
let pointval7 = <?php echo $output->{'7price'}; ?>;
let pointval8 = <?php echo $output->{'8price'}; ?>;
let pointval9 = <?php echo $output->{'9price'}; ?>;
    console.log(pointval);
    $("input[id=sponsor]").val(queryParams.sponsor);
    $("input[id=driver]").val(queryParams.driver);
    let getURL = "http://3.83.252.232:3001/points/sponsor/" + queryParams.sponsor;
    $.ajax({
        type: "GET",
        url: getURL,
        success: function (data) {
          data = data[0];
	  finalPoints = (pointval * data["value"]).toFixed(2);
	  finalPoints1 = (pointval1 * data["value"]).toFixed(2);
          finalPoints2 = (pointval2 * data["value"]).toFixed(2);
          finalPoints3 = (pointval3 * data["value"]).toFixed(2);
          finalPoints4 = (pointval4 * data["value"]).toFixed(2);
          finalPoints5 = (pointval5 * data["value"]).toFixed(2);
          finalPoints6 = (pointval6 * data["value"]).toFixed(2);
          finalPoints7 = (pointval7 * data["value"]).toFixed(2);
          finalPoints8 = (pointval8 * data["value"]).toFixed(2);
          finalPoints9 = (pointval9 * data["value"]).toFixed(2);
          document.getElementById("points").value = "" + finalPoints;
          document.getElementById("1points").value = "" + finalPoints1;
          document.getElementById("2points").value = "" + finalPoints2;
          document.getElementById("3points").value = "" + finalPoints3;
          document.getElementById("4points").value = "" + finalPoints4;
          document.getElementById("5points").value = "" + finalPoints5;
          document.getElementById("6points").value = "" + finalPoints6;
          document.getElementById("7points").value = "" + finalPoints7;
          document.getElementById("8points").value = "" + finalPoints8;
          document.getElementById("9points").value = "" + finalPoints9;
        }
      });

 getURL = "http://3.83.252.232:3001/getCart/" + queryParams.driver;
        $.ajax({
                type: "GET",
                url: getURL,
                success: function (data) {
                let resultString = "<tr><th>Item</th><th>Price</th></tr>";
                        for(let i=0; i<data.length; i++){
                                let info  = data[i];
                                resultString = resultString + "<tr><td>" + info["item_name"] + "</td><td>" + info["points"] + "</td></tr>";
                }
                console.log(resultString);
                document.getElementById("items-table").innerHTML = resultString;
                }
            });

        </script>

</script>

  </body>
</html>
