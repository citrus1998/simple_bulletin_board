<html>
<head>
  <meta name="viewport" content="width=320, height=480, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
	<meta charset="utf-8">
	<title>掲示板</title>
</head>
<center>
    <body>
        <form action="mission_3-1.php" method="POST" enctype="multipart/form-data">
            名前：<input type="text" name="name"><br>
            コメント：<textarea name="comment"></textarea><br>
            <input type="submit" value="送信"><br>
        </form>
    </body>
    <?php

        $name = @$_POST["name"];
        $comment = @$_POST["comment"];

        $y = date("Y");
        $m = date("m");
        $d = date("d");

        $h = date("G");
        $i = date("i");
        $s = date("s");
        
        $time = $y.'/'.$m.'/'.$d.' '.$h.':'.$i.':'.$s;

        if(!empty($name) && !empty($comment)){  
            $filename = "mission_3-1.txt";
            $number = count(file($filename))+1;
            $fp = fopen($filename, "a");
            fwrite($fp, $number.'<>'.$name."<>".$comment.'<>'.$time."\n");
            fclose($fp);
        }
        
        $file_array = file('mission_3-1.txt');
        
        foreach($file_array as $value){
            echo $value.'<br>';
        }

    ?>
</center>
</html>



