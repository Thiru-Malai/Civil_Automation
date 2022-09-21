var mysql = require('mysql')
var db = require('./dbconnnect')
var {conn} = require('./dbconnnect')

function insert(name, id, email, phonenum, passwords){
  
  let servername = "localhost";
  let username = "root";
  let password = "";
  let db = "civil_automation";

// Create connection
var conn = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "civil_automation"
});

conn.connect(function(err) {
        if (err) throw err;
        console.log("Connected successfully");
    });

  let ids = parseInt(id)

  var sql = "INSERT into user_details (id, name, email, password, phone_no) values ('"+ids+"', '"+name+"', '"+email+"', '"+passwords+"', '"+phonenum+"')" ;
  conn.query(sql, function (err, result) {
    console.log("Here")
    if (err) throw err;
    console.log("1 record inserted");
  });
}


module.exports.insert = insert;