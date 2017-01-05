<title>Chatbook Install Page</title>
<?php
    if(isset($_POST['install'])){
            $host = $_POST['host'];
            $user = $_POST['user'];
            $password = $_POST['password'];
            $database = $_POST['database'];
            $conn = new mysqli($host, $user, $password, $database);
            if($conn->connect_error) {
                die("Error connecting to database".$conn->connect_error);
            }
            else {
            $query = "CREATE TABLE register (
                          id int(11) AUTO_INCREMENT,
                          name varchar(255) NOT NULL,
                          email varchar(255) NOT NULL,
                          PRIMARY KEY  (id)
                          );";
            $query .= "CREATE TABLE chatbook (
                          ID bigint(20) AUTO_INCREMENT,
                          name text NOT NULL,
                          date_time datetime NOT NULL,
                          PRIMARY KEY  (ID)
                          );";
            $result = mysqli_multi_query($conn, $query);
            $tpl = file_get_contents('config.tpl'); //the config file's template.
            $config = fopen('config.php', 'w'); //this will generate the 'config.php' file.
            $config_data = str_replace(array('{host}', '{user}', '{password}', '{database}'), array($host, $user, $pass, $name), $tpl); //this will construct the config.php file's data.
            fwrite($config, $config_data);
            fclose($config);
            unlink('install.php');
            }
        }
?>
<form method="post" align="center">
        <table width="400" border="0" align="center" cellpadding="0" cellspacing="1">
    <tr><img src="cb.png"></tr>
    <tr>
        <th>Enter MySQL Host Name</th>
        <td>
        <input type="text" name="host" placeholder="MySQL Host" />
        </td>
    </tr>
    <tr>
        <th>Enter MySQL Usernmae</th>
        <td>
        <input type="text" name="user" placeholder="MySQL Usernmae" />
        </td>
    </tr>
    <tr>
        <th>Enter MySQL Password</th>
        <td>
        <input type="password" name="password" placeholder="MySQL Password" />
        </td>
    </tr>
    <tr>
        <th>Enter MySQL Database Name</th>
        <td>
        <input type="text" name="database" placeholder="MySQL Database Name" />
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
        <input type="submit" name="install" value="Install">
        </td>
    </tr>
</form>