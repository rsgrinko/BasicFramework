# BasicFramework
A simple framework for building web applications

<<<<<<< HEAD
# class DataBase
When creating a class in the constructor, you must specify the data for connecting to the database<br>
$DataBase = new DataBase('server', 'db_user', 'db_password', 'db_name');<br>
<br>
Supported methods:<br>
=======
## class DataBase
When creating a class in the constructor, you must specify the data for connecting to the database<br>
$DataBase = new DataBase('server', 'db_user', 'db_password', 'db_name');<br>
<br>
<b>Supported methods:</b><br>
>>>>>>> 569ca718fbc342061a9a9db7ec0cfb37fb1161e4
public function query($sql, $params = [])<br>
public function getItem($table, $where)<br>
public function getItems($table, $where, $sort = '')<br>
public function getAll($table, $sort = '', $params = [])<br>
<<<<<<< HEAD
<br>
<br>
# class Users
Used to work with users (authorization, logout, registration, receiving fields, etc.)<br>
<br>
Supported methods:<br>
public function Authorize($id)<br>
public function getFields($id)<br>
public function Logout()<br>
<br>
=======
## class Users
Used to work with users (authorization, logout, registration, receiving fields, etc.)<br>
<br>
<b>Supported methods:</b><br>
public function Authorize($id)<br>
public function getFields($id)<br>
public function Logout()<br>
<br>
>>>>>>> 569ca718fbc342061a9a9db7ec0cfb37fb1161e4
