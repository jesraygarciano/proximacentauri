var date = require('./date');

var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: 'beagle_011818'
});

    module.exports = function() {
        this.clear = () =>{
            this.instance;
            this.data;
            this.fetch_query = " where true ";
            this.fetch_arguments = [];
        }

        this.table = "messages";
        this.clear();
        
        this.find = function(id,callback){
            this.instance = con.query('Select * from users where id=? limit 3',[id], function (err, result) {
                if (err) throw err;
                this.instance = result;
                callback('success',result);
            });
        }

        this.where = function(prop, operator, argument){
            this.fetch_query += 'and '+prop+operator+"? ";
            this.fetch_arguments.push(argument);
            return this;
        }

        this.get = function(callback, limit){
            this.instance = con.query('Select * from '+this.table+' '+this.fetch_query+(limit ? ' limit '+limit : ''),this.fetch_arguments, function (err, result) {
                if (err) throw err;
                callback(result);
            });
            return this;
        }

        this.save = function(callback){
            var sql = "Insert into "+this.table+" ";
            var data = [];

            if(this.instance){
                sql = "Update "+this.table+" set ";
                for(var prop in this.data){ 
                    data.push(this.data[prop]);
                    if(data.length > 1)
                    {
                        sql += 'and '+prop+'=? ';
                    }
                    else
                    {
                        sql += prop+'=? ';
                    }
                }

                data.push(date.toMysqlFormat(new Date));
                sql += 'and created_at=? ';

                data.push(date.toMysqlFormat(new Date));
                sql += 'and updated_at=? ';
            }
            else
            {
                sql += "(";
                var vals = " values (";
                for(var prop in this.data){
                    data.push(this.data[prop]);
                    if(data.length > 1)
                    {
                        sql += "," + prop;
                        vals += ",?";
                    }
                    else
                    {
                        sql += prop;
                        vals += "?";
                    }
                }

                data.push(date.toMysqlFormat(new Date));
                data.push(date.toMysqlFormat(new Date));

                sql += ",created_at";
                sql += ",updated_at";

                vals += ",?";
                vals += ",?";
                vals += ")";
                sql += ")" + vals;
            }
            
            con.query(sql, data, function (err, result) {
                if (err) throw err;
                callback(result);
            });
        }

        this.setAsSeen = (message_id,callback) =>{
            con.query("Update "+this.table+" set seen=? where id=?", [1, message_id], function (err, result) {
                if (err) throw err;
                callback(result);
            });
        }

        this.setAsUnSeen = (message_id,callback) =>{
            con.query("Update "+this.table+" set seen=? where id=?", [0, message_id], function (err, result) {
                if (err) throw err;
                callback(result);
            });
        }
    }