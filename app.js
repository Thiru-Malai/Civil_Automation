var mysql = require('mysql')
var http = require('http');
var express = require('express');
var path = require("path");
const bodyParser = require('body-parser');
const route = require('./routes');


const app = express();
app.use(bodyParser.urlencoded({extended: false}));
app.use(express.static(path.join(__dirname, 'public')));
app.use('/',route);
app.use((req, res,next)=>{
   res.status(404).send('<h1> Page not found </h1>');
});
app.engine('html', require('ejs').renderFile);
app.set('view engine', 'html');
app.set('views', __dirname);
const server = http.createServer(app);




server.listen(8888);  