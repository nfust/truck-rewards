const crypto = require('crypto');
const express = require('express');
var cookieParser = require('cookie-parser');
const app = express();
const bodyParser = require('body-parser');
var nodemailer = require('nodemailer');
var generator = require('generate-password');
const mysql = require('mysql');


const connection = mysql.createConnection({
   host: 'database-1.c0pt40lcpl02.us-east-1.rds.amazonaws.com',
   user: 'admin',
   database: 'main',
   password: 'wearein4910'
   });

app.use(cookieParser());

app.use(bodyParser.json());

app.use(bodyParser.urlencoded({
  extended: true
}));

app.use(function(req, res, next) {
        res.header("Access-Control-Allow-Origin", "*");
        res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, Authorization");
        res.header('Access-Control-Expose-Headers', 'X-Total-Count');
        next();
});

function parseCookies (request) {
    var list = {},
        rc = request.headers.cookie;

    rc && rc.split(';').forEach(function( cookie ) {
        var parts = cookie.split('=');
        list[parts.shift().trim()] = decodeURI(parts.join('='));
    });

    return list;
}

var transporter = nodemailer.createTransport({
  service: 'gmail',
  auth: {
    user: 'truckrewardsautoemail@gmail.com',
    pass: 'wearein4910'
  }
});



app.get('/user/:Username', (req, res) => {
   console.log("Getting user: " + req.params.Username);

   const userID = req.params.username;
   const queryString = "SELECT * FROM user WHERE username = \"" + req.params.Username+ "\"";
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant find driver " + userID);
      res.sendStatus(400);
   }

   else{
      console.log("I think we got the user");
      console.log(rows);
      res.json(rows)
   }

   });

})

app.get('/points/:Username', (req, res) => {
   console.log("Getting points")
   const queryString = "SELECT * FROM points WHERE username = \"" + req.params.Username+ "\"";
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant find driver " + userID);
      res.sendStatus(400);
   }

   else{
      console.log("I we got the points");
      console.log(rows);
      res.json(rows)
   }

   });

})

app.get('/points/sponsor/:SponsorID', (req, res) => {
   console.log("Getting points")
   const queryString = "SELECT * FROM points WHERE sponsor = \"" + req.params.SponsorID+ "\"";
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant find driver " + userID);
      res.sendStatus(400);
   }

   else{
      console.log("I we got the points");
      console.log(rows);
      res.json(rows)
   }

   });

})


app.post('/driver', (req,res) => {

   let input = req.body;

   //Hashing password and storing it
   const salt = new Date().toString();
   hash = crypto.createHash('sha256').update(input.password+salt).digest('base64');

   queryString = "INSERT INTO user(email,first,middle,last,type,phone,username,pass,overTime,address,company,hash, salt) VALUES(\""+input.email+"\", \""+input.first+"\", \""+input.middle+"\", \""+input.last+"\",\"Driver\", \""+input.phone+"\", \""+input.username+"\", \""+input.password+"\", 0, NULL, NULL, \""+hash+"\", \""+salt+"\");"
   console.log(queryString);

   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant create driver " + input.username);
      res.sendStatus(400);
   }

   else{
      console.log("User added")
      res.json(input);
   }
   });

})

app.post('/manager', (req,res) => {

   let input = req.body;
   queryString = "INSERT INTO user VALUES (\""+input.email+"\", \""+input.first+"\", \""+input.middle+"\", \""+input.last+"\",\""+input.company+"\", \"Manager\", \""+input.phone+"\", \""+input.username+"\", \""+input.password+"\", 0, 0);"
   console.log(queryString);

   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant create manager " + input.username);
      res.sendStatus(400);
   }

   else{
      console.log("User added")
      res.send(input);
   }
   });

})

app.get("/", (req,res) => {
   console.log("Responding to root route");
   res.send("Hey from root")
})

app.post("/login", (req,res) =>{
   let logUser = req.body;
   console.log("Logging in user " + logUser.username);
   queryString = "SELECT * FROM user WHERE username = \'" + logUser.username + "\'";
   console.log(queryString);
   connection.query(queryString,(err, result, fields) => {
   if(err){
      console.log("Cant find user " + logUser.username);
      res.sendStatus(400);
   }

   else{
      if(result[0].pass == logUser.pwd && result[0].hash==null){
        let driver_redirect = "http://3.83.252.232/index.php";
        let sponsor_redirect = "http://3.83.252.232/sponsor.php";
        let admin_redirect = "http://3.83.252.232/admin.php";
	console.log(result);
	 res.cookie("username", logUser.username);
	 res.cookie("type", result[0].type);
         if (result[0].type == "Driver") {
           res.redirect(driver_redirect);
         }
         else if (result[0].type == 'Sponsor') {
           res.redirect(sponsor_redirect);
         }
         else if (result[0].type == "Admin") {
           res.redirect(admin_redirect);
         }
      }
      else if(result[0].hash!=null){
	let hashCheck = crypto.createHash('sha256').update(logUser.pwd+result[0].salt).digest('base64');
	if (hashCheck==result[0].hash){
	   let driver_redirect = "http://3.83.252.232/index.php";
     let sponsor_redirect = "http://3.83.252.232sponsor.php";
     let admin_redirect = "http://3.83.252.232/admin.php";
           console.log(result);
           res.cookie("username", logUser.username);
           res.cookie("type", result[0].type);
           if (result[0].type == "Driver") {
             res.redirect(driver_redirect);
           }
           else if (result[0].type == 'Sponsor') {
             res.redirect(sponsor_redirect);
           }
           else if (result[0].type == "Admin") {
             res.redirect(admin_redirect);
           }
	}
	else{
         let message = "Username/Password is incorrect";
        console.log(message);
         res.redirect("http://3.83.252.232/Login.html");
      	}
      }
      else{
         let message = "Username/Password is incorrect";
	console.log(message);
	 res.redirect("http://3.83.252.232/Login.html");
      }
   }
   });


});

app.post("/logout", (req,res) =>{
	res.clearCookie('username');
	res.clearCookie('type');
	res.redirect("http://3.83.252.232/Login.html")
});


app.post('/driver/edit', (req,res) => {
   var cookies = parseCookies(req);
   let input = req.body;
      queryString = "UPDATE user SET first = \""+input.first+"\" , middle = \""+input.middle+"\"  ,last = \""+input.last+"\",username = \""+input.username+"\",email = \""+input.email+"\",phone = \""+input.phone+"\",address = \""+input.address+"\"  WHERE username = \""+input.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit driver " + input.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited" + input.username);
      res.cookie("username", input.username);
      res.redirect("http://3.83.252.232/profile.php");
   }
   });

})

app.post('/sponsorDriver/edit', (req,res) => {
   let input = req.body;
      queryString = "UPDATE user SET first = \""+input.first+"\" , middle = \""+input.middle+"\"  ,last = \""+input.last+"\",username = \""+input.username+"\",email = \""+input.email+"\",phone = \""+input.phone+"\",address = \""+input.address+"\"  WHERE username = \""+input.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit driver " + input.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited" + input.username);
      res.redirect("http://3.83.252.232/driverList.html");
   }
   });

})


app.post('/forgotpassword', (req,res) => {
	const recEmail = req.body.Email;
	const newPass = generator.generate({
   		 length: 10,
    		numbers: true
	});


	var mailOptions = {
  		from: 'truckrewardsautoemail@gmail.com',
  		to: recEmail,
  		subject: 'Truck Rewards Password Reset',
 		text: 'Your new password is: ' + newPass + '\n\nUse this password to login and change it from the profile page'
	};

	const queryString = "UPDATE user SET pass=\"" + newPass + "\" WHERE email=\"" + recEmail +"\";";
	console.log(queryString);
   	connection.query(queryString,(err, rows, fields) => {
   	if(err){
      		console.log("Cant find/change password of " + recEmail);
      		res.sendStatus(400);
   	}
   	else{
      		console.log("Password changed, Sending Email");
      		transporter.sendMail(mailOptions, function(error, info){
  			if (error) {
    			console.log(error);
			res.sendStatus(400);}
			else {
    			console.log('Email sent: ' + info.response);
			res.redirect("http://3.83.252.232/sentEmail.html");}
		});
   	}
   	});


});


app.post('/resetpassword', (req,res) => {
	const oldPass = req.body.oldpwd;
	const newPass = req.body.newpwd;
	const cookies = parseCookies(req);

	queryString = "UPDATE user SET pass=\'"+newPass+ "\' WHERE username=\'" +cookies.username+ "\'";
   	console.log(queryString);

   	connection.query(queryString,(err, rows, fields) => {
   	if(err){
      		console.log("Cant change password driver " + cookies.username);
      		res.redirect("ResetPassword.html#");
   	}

   	else{
      			console.log("Password Changed")
      			res.redirect("http://3.83.252.232/profile.php");
   	}
   	});
});


app.post('/admin', (req,res) => {

   let input = req.body;
   queryString = "INSERT INTO user VALUES (\""+input.email+"\", \""+input.first+"\", \""+input.middle+"\", \""+input.last+"\",\"Admin\", \""+input.phone+"\", \""+input.username+"\", \""+input.password+"\", 0, NULL, NULL);"
   console.log(queryString);

   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant create admin " + input.username);
      res.sendStatus(400);
   }

   else{
      console.log("User added")
      res.json(input);
   }
   });

})


app.post('/points/edit', (req,res) => {
  var cookies = parseCookies(req);
  let input = req.body;
     queryString = "UPDATE points SET points = \""+input.points+"\" WHERE username = \""+input.driver+"\" , sponsor = \""+cookies.username+"\";"
  console.log(queryString);
  connection.query(queryString,(err, rows, fields) => {
  if(err){
     console.log("Cant edit points for " + input.driver);
     res.sendStatus(400);
  }
  else{
     console.log("Driver points edited" + input.driver);
   }
   });

})


app.get('/points/driver/:SponsorID', (req, res) => {
   console.log("Getting points")
   const queryString = "SELECT * FROM points WHERE username = \""+input.driver+"\" , sponsor = \"" + req.params.SponsorID+ "\"";
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant find points for driver " + input.driver);
      res.sendStatus(400);
   }

   else{
      console.log("I we got the points");
      console.log(rows);
      res.json(rows)
   }

   });

})

app.post('/apply', (req,res) => {
   let cookies = parseCookies(req);
   let input = req.body;

   const queryString = "INSERT IGNORE INTO pendingAccount(sponsor, Driver) VALUES(\""+input.sponsorName+"\" , \"" + cookies.username+ "\");";
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant insert into pendingAccount " + input.driver);
      res.sendStatus(400);
   }

   else{
      console.log("Application Successful");
      console.log(rows);
      res.redirect("http://3.83.252.232/driverApply.html");
   }

   });


})


app.get('/apps/sponsor/:SponsorID', (req, res) => {
   console.log("Getting points")
   const queryString = "SELECT * FROM pendingAccount WHERE sponsor = \"" + req.params.SponsorID+ "\";";
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant find applications for sponsor" + req.params.SponsorID);
      res.sendStatus(400);
   }

   else{
      console.log("sending applications");
      console.log(rows);
      res.json(rows)
   }

   });

})


app.post('/acceptApp/:DriverID', (req,res) => {
   let cookies = parseCookies(req);
   let input = req.body;


   const queryString = "DELETE FROM pendingAccount WHERE Driver=\""+req.params.DriverID+"\"AND sponsor= \""+cookies.username+ "\";";
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant Delete from pendingAccount ");
   }

   });


   const queryString2 = "INSERT INTO points(username, points, sponsor) VALUES(\""+req.params.DriverID+"\" , 0 , \"" + cookies.username+ "\");";
   console.log(queryString2);
   connection.query(queryString2,(err, rows, fields) => {
   if(err){
      console.log("Cant insert into pendingAccount ");
      res.sendStatus(400);
   }

   else{
      console.log("Application Accepted Successful");
      console.log(rows);
      res.redirect("http://3.83.252.232/pendingApplications.html");
   }

   });


})


app.post('/declineApp/:DriverID', (req,res) => {
   let cookies = parseCookies(req);
   let input = req.body;


   const queryString = "DELETE FROM pendingAccount WHERE Driver=\""+req.params.DriverID+"\"AND sponsor= \""+cookies.username+ "\";";
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant Delete from pendingAccount ");
   }
   else{
      console.log("Application Reject Successful");
      console.log(rows);
      res.redirect("http://3.83.252.232/pendingApplications.html");
   }

   });

})


app.post('/deleteSponsor', (req,res) => {
   let cookies = parseCookies(req);

   const queryString = "DELETE FROM pendingAccount WHERE sponsor= \""+cookies.username+ "\";";
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant Delete from pendingAccount ");
   }
   });

   const queryString2 = "DELETE FROM points WHERE sponsor=\""+cookies.username+ "\";";
   console.log(queryString2);
   connection.query(queryString2,(err, rows, fields) => {
   if(err){
      console.log("Cant Delete from point ");
   }
   });

   const queryString3 = "DELETE FROM user WHERE username=\""+cookies.username+ "\";";
   console.log(queryString3);
   connection.query(queryString3,(err, rows, fields) => {
   if(err){
      console.log("Cant Delete from point ");
   }

   else{
        res.clearCookie('username');
        res.clearCookie('type');
        res.redirect("http://3.83.252.232/Login.html")
   }
   });

})

app.post('/changeVal', (req,res) => {
   let cookies = parseCookies(req);
   let input = req.body;


   const queryString = "UPDATE points SET value=\""+input.value+"\" WHERE sponsor= \""+cookies.username+ "\";";
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant Change Value ");
   }
   else{
      console.log("Value Change Successful");
      console.log(rows);
      res.redirect("http://3.83.252.232/profile.php");
   }

   });

})


app.post('/removeDriver/:DriverID', (req,res) => {
   let cookies = parseCookies(req);
   let input = req.body;


   const queryString = "DELETE FROM points WHERE username=\""+req.params.DriverID+"\"AND sponsor= \""+cookies.username+ "\";";
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant Delete from points ");
   }
   else{
      console.log("Application Reject Successful");
      console.log(rows);
      res.redirect("http://3.83.252.232/driverList.html");
   }

   });

})


app.get('/user/driver/admin', (req, res) => {
  console.log("Getting drivers")
  const queryString = "SELECT username FROM user WHERE type = \"Driver\";";
  connection.query(queryString,(err, rows, fields) => {
  if(err){
     console.log("Cant find drivers");
     res.sendStatus(400);
  }

  else{
     console.log("I think we got the drivers");
     console.log(rows);
     res.json(rows)
  }

  });
})


app.get('/user/sponsor/admin', (req, res) => {
  console.log("Getting sponsors")
  const queryString = "SELECT username FROM user where type = \"Sponsor\"";
  connection.query(queryString,(err, rows, fields) => {
  if(err){
     console.log("Cant find sponsors");
     res.sendStatus(400);
  }

  else{
     console.log("I think we got the sponsors");
     console.log(rows);
     res.json(rows)
  }

  });
})


app.post('/driver/edit/:DriverID', (req,res) => {
   let input = req.body;
   queryString = "UPDATE user SET first = \""+input.first+"\" , middle = \""+input.middle+"\"  ,last = \""+input.last+"\",username = \""+input.username+"\",email = \""+input.email+"\",phone = \""+input.phone+"\",address = \""+input.address+"\"  WHERE username = \""+req.params.Username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit driver " + input.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited" + input.username);
      res.redirect("http://3.83.252.232/ViewDriverProfile.php");
   }
   });

})


app.post('/sponsor/edit/:SponsorID', (req,res) => {
   let input = req.body;
   queryString = "UPDATE user SET first = \""+input.first+"\" , middle = \""+input.middle+"\"  ,last = \""+input.last+"\",username = \""+input.username+"\",email = \""+input.email+"\",phone = \""+input.phone+"\",address = \""+input.address+"\"  WHERE username = \""+req.params.Username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit driver " + input.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited" + input.username);
      res.redirect("http://3.83.252.232/ViewDriverProfile.php");
   }
   });

})


app.post('/resetpassword/:Username', (req,res) => {
  let input = req.body;
	queryString = "UPDATE user SET pass=\'"+input.password+ "\' WHERE username=\'" +req.params.username+ "\'";
   	console.log(queryString);

   	connection.query(queryString,(err, rows, fields) => {
   	if(err){
      		console.log("Cant change password driver " + req.params.username);
      		res.redirect("ResetPassword.html#");
   	}

   	else{
      			console.log("Password Changed")
      			res.redirect("http://3.83.252.232/profile.php");
   	}
   	});
});


let port = 3001;
app.listen(port, function () {
  console.log('Truck Rewards listening on port '+port+'!');
});
