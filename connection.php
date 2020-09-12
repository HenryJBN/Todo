<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 12/09/2020
 * Time: 12:41 PM
 */

define('USERNAME', 'root');
define('PASSWORD', 'henry');
define('DB_NAME', 'todo');
define('DB_HOST', '127.0.0.1');

try
{
    $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,USERNAME, PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Connection successful";


}
catch (PDOException $e)
{
    exit("Error: " . $e->getMessage());
}
