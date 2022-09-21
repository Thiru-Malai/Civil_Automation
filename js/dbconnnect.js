var mysql = require('mysql')

let servername = "localhost";
let username = "root";
let password = "";
let db = "civil_automation";

// Create connection
var conn = mysql.createConnection({servername, username, password, db});


conn.connect(function(err) {
        if (err) throw err;
        console.log("Connected successfully");
    });


// module.exports = {conn}
// module.exports.connection = connection;
 module.exports =  {conn}