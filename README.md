# BasicFramework
A simple framework for building web applications

# class DataBase
When creating a class in the constructor, you must specify the data for connecting to the database<br>
$DataBase = new DataBase('server', 'db_user', 'db_password', 'db_name');

Supported methods:
public function query($sql, $params = [])
public function getItem($table, $where)
public function getItems($table, $where, $sort = '')
public function getAll($table, $sort = '', $params = [])


# class Users
Used to work with users (authorization, logout, registration, receiving fields, etc.)

Supported methods:
public function Authorize($id)
public function getFields($id)
public function Logout()
