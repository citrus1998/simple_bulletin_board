<html>
<head>
  <meta name="viewport" content="width=320, height=480, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
	<meta charset="utf-8">
	<title>掲示板</title>
</head>
<center>
    <body>
        <form action="mission_3-3.php" method="POST" enctype="multipart/form-data">
            名前：<input type="text" name="name"><br>
            コメント：<textarea name="comment"></textarea><br>
            <input type="submit" value="送信"><br>
        </form>
        
        <?php

        $name = @$_POST["name"];
        $comment = @$_POST["comment"];
        
        $filename = "mission_3-3.txt";

        $y = date("Y");
        $m = date("m");
        $d = date("d");

        $h = date("G");
        $i = date("i");
        $s = date("s");
        
        $time = $y.'/'.$m.'/'.$d.' '.$h.':'.$i.':'.$s;

        if(!empty($name) && !empty($comment)){  
            $number = count(file($filename))+1;
            $fp = fopen($filename, "a");
            fwrite($fp, $number.'<>'.$name."<>".$comment.'<>'.$time."\n");
            fclose($fp);
        }

        $file_array = file('mission_3-3.txt');
        
        foreach($file_array as $value){  
            $file_array_ex = explode( '<>', $value );
            $count = $file_array_ex[0];
        }
        ?>
        
        <form action="mission_3-3.php" method="POST" enctype="multipart/form-data">
            <select name="number" id="number">
            <?php
            for ($j = 1; $j <= $count; $j++) {
                print ('<option value="'.$j.'">'.$j.'</option>');
            }
            ?>
            </select>
            <input type="submit" value="削除"><br>
        </form>

        <?php

        if( isset($_POST["number"]) ){
            $delete_name = @$_POST["number"];

            $lines = array();
            $fp = fopen($filename, "r");
            while (!feof($fp)){
                $lines[] = fgets($fp);
            }
            fclose($fp);

            $fp = fopen($filename, "w");
            foreach($lines as $value){  
                $ex_file_array = explode( '<>', $value );
                if( $ex_file_array[0] != $delete_name ){
                    fwrite($fp, $value);
                }
                else{
                    fwrite($fp, 'D<>'.$name."<>".$comment.'<>'.$time."\n");
                }
            }

            fclose($fp);

        } 

        $cnt = 0;
        foreach($file_array as $value){  
            $file_array_ex = explode( '<>', $value );
            for($id = 0; $id < 4; $id++){
                if($file_array_ex[0] == 'D'){
                    $cnt = 1;
                    break; 
                }
                else{
                    echo $file_array_ex[$id];
                }
            }
            if($cnt != 1){
                echo '<br>';
            }
            $cnt = 0;
        }
        ?>
    </body>
</center>
</html>



