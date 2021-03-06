# BasicFramework
A simple framework for building web applications
![alt text](loginform.png "Login form")

![alt text](user-example.png "Private user section")

## class DataBase
When creating a class in the constructor, you must specify the data for connecting to the database<br>
$DataBase = new DataBase('server', 'db_user', 'db_password', 'db_name');<br>
<br>
<b>Supported methods:</b><br>
public function query($sql, $params)<br>
public function getItem($table, $where)<br>
public function getItems($table, $where, $sort)<br>
public function getAll($table, $sort, $params)<br>
public function addItem($table, $data)<br>

## class Users
Used to work with users (authorization, logout, registration, receiving fields, etc.)<br>
<br>
<b>Supported methods:</b><br>
public function Authorize($id)<br>
public function getFields($id)<br>
public function Logout()<br>
public function is_user()<br>
public function Registration($login, $password, $level = 'user', $name = '')<br>
public function user_exists($login)<br>
public function SecurityAuthorize($login, $password)<br>
<br>
