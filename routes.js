const path = require('path');
const express = require('express');
const router = express.Router();
const signup = require('./js/signup')
const login = require('./js/login')


router.get('/', (req, res, next) => {
   res.sendFile(path.join(__dirname, 'userregisteration.html'));
});
router.post('/signup', (req, res, next) => {
   let name = req.body.names;
   let id = req.body.ids;
   let email = req.body.emails;
   let phonenum = req.body.phonenum;
   let password = req.body.passwords;

   signup.insert(name, id, email, phonenum, password);
   res.sendFile(path.join(__dirname, 'userregisteration.html'));

});
router.post('/login', (req, res, next) => {
   let email = req.body.email;
   let password = req.body.password;


   var result = null
   login.login(email, password, function(result){
      res.render(__dirname + '/views/index.html', {
         name: result[0].name,
         profile: result[0].profile
      })
});

});
module.exports = router;