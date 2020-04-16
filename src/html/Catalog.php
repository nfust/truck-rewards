<?php 

if ($_GET['search'] && $_GET['sort'])
	$command = escapeshellcmd('python3 findbykeywords.py '.$_GET['search'].' '.$_GET['sort']);
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
      <form class="example" action="/Catalog.php" enctype="multipart/form-data">
      <label for="sort" style = color:#FFFFFF >Search Type:</label>

      <select id="sort" name = "sort">
      <option value="BestMatch">Best Match</option>
      <option value="PricePlusShippingHighest">High to Low</option>
      <option value="PricePlusShippingLowest">Low to High</option>
      </select> 
      <input type="text" placeholder="Explore the Catalog.." name="search">
      <input type="submit" value="Submit">
      </form>
	<!--<a href="catalog.html"><?php echo $output->{'9URL'}; ?></a>-->
      <a href="Catalog.php">Catalog</a> |
      <a href="purchaseHistory.html">Purchase History</a> |
      <a href="pendingOrders.html">Pending Orders</a> |
	
      <a href="sponsorInfo.html">Sponsor Info</a>
      
	    
      <div class="logout">
        <form align="right" class="form" method="post" action="http://3.83.252.232:3001/logout">
          <button name="logout" type="submit">Log Out</button>
        </form>
      </div>
	    
    </nav>
	<link rel="stylesheet" type="text/css" href="catalog.css">
</head>

<ul class="products"> <item>
        <img src= "<?php echo $output->{'0URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'0title'}; ?></h4>
            <p><?php echo $output->{'0price'}; ?> Points </p>
        </a>
    </item><item>
        <img src= "<?php echo $output->{'1URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'1title'}; ?></h4>
            <p><?php echo $output->{'1price'}; ?> Points </p>
        </a>
    </item><item>
        <img src= "<?php echo $output->{'2URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'2title'}; ?></h4>
            <p><?php echo $output->{'2price'}; ?> Points </p>
        </a>
    </item><item>
        <img src= "<?php echo $output->{'3URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'3title'}; ?></h4>
            <p><?php echo $output->{'3price'}; ?> Points </p>
        </a>
    </item><item>
        <img src= "<?php echo $output->{'4URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'4title'}; ?></h4>
            <p><?php echo $output->{'4price'}; ?> Points </p>
        </a>
    </item><item>
        <img src= "<?php echo $output->{'5URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'5title'}; ?></h4>
            <p><?php echo $output->{'5price'}; ?> Points </p>
        </a>
    </item><item>
        <img src= "<?php echo $output->{'6URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'6title'}; ?></h4>
            <p><?php echo $output->{'6price'}; ?> Points </p>
        </a>
    </item><item>
        <img src= "<?php echo $output->{'7URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'7title'}; ?></h4>
            <p><?php echo $output->{'7price'}; ?> Points </p>
        </a>
    </item><item>
        <img src= "<?php echo $output->{'8URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'8title'}; ?></h4>
            <p><?php echo $output->{'8price'}; ?> Points </p>
        </a>
    </item><item>
        <img src= "<?php echo $output->{'9URL'}; ?>" style="width:300px;height:300px;">
        <a href="#" style="color:#007BC4">    
            <h4><?php echo $output->{'9title'}; ?></h4>
            <p><?php echo $output->{'9price'}; ?> Points </p>
        </a>
    </item>
</ul>
    

	
  </body>
</html>
