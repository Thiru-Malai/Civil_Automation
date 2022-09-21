var mysql = require('mysql')
var alert = require('alert');

function login(email, passwords, fn) {

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

    conn.connect(function (err) {
        if (err) throw err;
        console.log("Connected successfully");
    });
    var res = null

    var sql = "SELECT * from user_details where email = '" + email + "' and password = '" + passwords + "'";
    let val = conn.query(sql, function (err, result) {
        if (result.length == 0) {
            alert('Incorrect Credientials')
            console.log(0)
            return 0
        }
        if (err) {
            throw err
        }
        else{
            console.log(result)
            fn(result)
        }
    });
}


module.exports.login = login;
