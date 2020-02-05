
const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const mysql = require('mysql');


const connection = mysql.createConnection({
   host: 'database-1.c0pt40lcpl02.us-east-1.rds.amazonaws.com',
   user: 'admin',
   database: 'main',
   password: 'wearein4910'
   });


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


app.get('/driver/:id', (req, res) => {
   console.log("Getting user: " + req.params.id);

   const userID = req.params.id;
   const queryString = "SELECT * FROM driver WHERE email = ?";
   connection.query(queryString, [userID],(err, rows, fields) => {
   if(err){
      console.log("Cant find driver " + userID);
      res.sendStatus(400);
   }

   else{
      console.log("I think we got the user")
      res.json(rows)
   }

   });

})

app.post('/driver', (req,res) => {
   console.log("zorp");
   let input = req.body;
   queryString = "INSERT INTO driver VALUES (\""+input.email+"\", \""+input.first+"\", \""+input.middle+"\", \""+input.last+"\",\""+input.phone+"\", \""+input.username+"\", \""+input.password+"\", 0);"
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

app.get("/", (req,res) => {
   console.log("Responding to root route");
   res.send("Hey from root")
})

app.get("/users", (req, res) =>{
   var user1 = {firstName: "Nick", lastName: "Fust"}
   const user2 = {firstName: "Greg", lastName: "Example"}
   res.json([user1, user2]);
})

let port = 3001;
app.listen(port, function () {
  console.log('Truck Rewards listening on port '+port+'!');
});
