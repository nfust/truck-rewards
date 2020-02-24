
const express = require('express');
var cookieParser = require('cookie-parser');
const app = express();
const bodyParser = require('body-parser');
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

app.post('/driver', (req,res) => {

   let input = req.body;
   queryString = "INSERT INTO user VALUES (\""+input.email+"\", \""+input.first+"\", \""+input.middle+"\", \""+input.last+"\",\"None\", \"Driver\", \""+input.phone+"\", \""+input.username+"\", \""+input.password+"\", 0, 0);"
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
   queryString = "SELECT pass FROM user WHERE username = \'" + logUser.username + "\'";

   connection.query(queryString,(err, result, fields) => {
   if(err){
      console.log("Cant find user " + logUser.username);
      res.sendStatus(400);
   }

   else{
      if(result[0].pass == logUser.pwd){
         let redirect = "http://3.83.252.232:3001/user/" + logUser.username;
	 res.cookie("username", logUser.username);
         res.redirect(redirect);
      }
      else{
         let message = "Username/Password is incorrect";
	console.log(message);
	 res.redirect("http://3.83.252.232/Login.html");
      }
   }
   });


});


let port = 3001;
app.listen(port, function () {
  console.log('Truck Rewards listening on port '+port+'!');
});
