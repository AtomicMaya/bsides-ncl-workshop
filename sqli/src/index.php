<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
require "./utils.php";
$query_prefix = "SELECT name, price FROM USERS WHERE name LIKE '";
$query_suffix = "'";
?>
<html>

<head>
    <title>SQLi</title>
</head>

<body>
    <h1>Injection Intro</h1>
    <p>
        It seems that theres a USERS table in the store's database<br>
        Try exploiting it
    </p>
    <hr>
    <h2>Agi's Pande Recoveries</h2>
    <form action="index.php">
        <input type="text" name="query" size="30" value="<?php (isset($_REQUEST['query']) && $_REQUEST['query'] !== '') ? $_REQUEST['query'] : '' ?>">
    </form>
    <?php
    if (isset($_REQUEST['query'])) {
        $db = new SQLite3('sqli.db');
        echo queryTable($db, $query_prefix . $_REQUEST['query'] . $query_suffix);
    }
    ?>
</body>

</html>
