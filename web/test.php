<?php
namespace web;
/*
    $GET = array(
        'surname' => 'peterson',
        'name' => 'ololo'
    );
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
*/
    function gett($key, $default) {
        return arr($_GET, $key, $default);
    }

    function postt($key, $default) {
        return arr($_SERVER, $key, $default);
    }


    function arr($array, $key, $default)
    {
        if (isset($array[$key])) {
            return $array[$key];
        }
        return $default;

    }

    function gettPostt ($key, $default) {
        if(isset($_GET[$key])){
            return $_GET[$key];
        }
        if(isset($_POST[$key])){
            return $_POST[$key];
        }
        return $default;
    }
/*
    echo gett('name', 'vasja').'<br>'; //ololo
    echo gett('notex', 'lololo').'<br>';//lololo
    echo gett('surname', null).'<br>'; //peterson
*/

try {

    $user = 'root';
    $pass = 'poxtzi73';
    $dbh = new \PDO('mysql:host=localhost;dbname=testDB;charset=UTF8', $user, $pass);
    $dbh->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND, \PDO::ERRMODE_EXCEPTION);

   // $names = array('Clark', 'vasja');
    $name = 'vasja';
    $sth = $dbh->prepare("SELECT * FROM user WHERE name = :name");
    $sth->bindValue(':name', $name, \PDO::PARAM_STR);
    $sth->execute();
    $rows = $sth->fetchAll(\PDO::FETCH_ASSOC);
    var_dump($rows);

    $dbh = null;
    echo 'STATUS OK';
} catch (\Exception $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";

}