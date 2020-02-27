app.post('/driver/edit', (req,res) => {

   let input = req.body;
   queryString = "UPDATE user SET first = \""+input.first+"\" WHERE username = \""+req.params.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit driver " + req.params.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited")
      res.json(input);
   }
   });

   queryString = "UPDATE user SET middle = \""+input.middle+"\" WHERE username = \""+req.params.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit driver " + req.params.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited")
      res.json(input);
   }
   });

   queryString = "UPDATE user SET last = \""+input.last+"\" WHERE username = \""+req.params.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit driver " + req.params.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited")
      res.json(input);
   }
   });

   queryString = "UPDATE user SET username = \""+input.username+"\" WHERE username = \""+req.params.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit driver " + req.params.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited")
      res.json(input);
   }
   });

   queryString = "UPDATE user SET email = \""+input.email+"\" WHERE username = \""+req.params.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit driver " + req.params.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited")
      res.json(input);
   }
   });

   queryString = "UPDATE user SET phone = \""+input.phone+"\" WHERE username = \""+req.params.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit driver " + req.params.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited")
      res.json(input);
   }
   });

   queryString = "UPDATE user SET address = \""+input.address+"\" WHERE username = \""+req.params.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit driver " + req.params.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited")
      res.json(input);
   }
   });

})

app.post('/admin/edit', (req,res) => {

   let input = req.body;
   queryString = "UPDATE user SET first = \""+input.name+"\" WHERE username = \""+req.params.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit admin " + req.params.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited")
      res.json(input);
   }
   });

   queryString = "UPDATE user SET username = \""+input.username+"\" WHERE username = \""+req.params.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit admin " + req.params.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited")
      res.json(input);
   }
   });

   queryString = "UPDATE user SET email = \""+input.email+"\" WHERE username = \""+req.params.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit admin " + req.params.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited")
      res.json(input);
   }
   });

   queryString = "UPDATE user SET phone = \""+input.phone+"\" WHERE username = \""+req.params.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit admin " + req.params.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited")
      res.json(input);
   }
   });

})

app.post('/sponsor/edit', (req,res) => {

   let input = req.body;
   queryString = "UPDATE user SET first = \""+input.name+"\" WHERE username = \""+req.params.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit sponsor " + req.params.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited")
      res.json(input);
   }
   });

   queryString = "UPDATE user SET company = \""+input.company+"\" WHERE username = \""+req.params.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit sponsor " + req.params.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited")
      res.json(input);
   }
   });

   queryString = "UPDATE user SET username = \""+input.username+"\" WHERE username = \""+req.params.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit sponsor " + req.params.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited")
      res.json(input);
   }
   });

   queryString = "UPDATE user SET email = \""+input.email+"\" WHERE username = \""+req.params.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit sponsor " + req.params.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited")
      res.json(input);
   }
   });

   queryString = "UPDATE user SET phone = \""+input.phone+"\" WHERE username = \""+req.params.username+"\";"
   console.log(queryString);
   connection.query(queryString,(err, rows, fields) => {
   if(err){
      console.log("Cant edit sponsor " + req.params.username);
      res.sendStatus(400);
   }
   else{
      console.log("User edited")
      res.json(input);
   }
   });

})
