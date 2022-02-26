<html>
<head>
  <meta name="viewport" content="width=320, height=480, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
	<meta charset="utf-8">
	<title>Test</title>
</head>
<center>
    <body>
        <?php
            $dsn = 'mysql:dbname=tb210454db;host=localhost';
            $username = 'tb-210454';
            $password = 'vr7skPkWWp';
            $dbh = new PDO($dsn, $username, $password);

            // テーブル作成のSQLを作成
            $sql = 'CREATE TABLE user (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
	            name VARCHAR(20),
	            age INT(11),
	            registry_datetime DATETIME
                ) engine=innodb default charset=utf8';

            // SQLを実行
            $res = $dbh->query($sql);
        ?>
    </body>
</center>
</html>





