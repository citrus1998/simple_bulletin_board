<html>
<head>
  <meta name="viewport" content="width=320, height=480, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes"><!-- for smartphone. ここは一旦、いじらなくてOKです。 -->
	<meta charset="utf-8"><!-- 文字コード指定。ここはこのままで。 -->
	<title>Test</title>
</head>
<center>
    <body>
        <form action="mission_2-1.php" method="POST" enctype="multipart/form-data">
            名前：<input type="text" name="name"><br>
            <input type="submit" value="SEND"><br>
        </form>
        <?php
            $comment = $_POST["name"];
            echo $comment."を受け付けました。<br>";
        ?>
    </body>
</center>
</html>



