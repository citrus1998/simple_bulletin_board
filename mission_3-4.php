<html>
<head>
  <meta name="viewport" content="width=320, height=480, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
	<meta charset="utf-8">
	<title>掲示板</title>
</head>
<center>
    <body>
        <form action="mission_3-4.php" method="POST" enctype="multipart/form-data">
            名前：<input type="text" name="name"><br>
            コメント：<textarea name="comment"></textarea><br>
            <input type="submit" value="送信"><br>
        </form>
        <?php

        $name = @$_POST["name"];
        $comment = @$_POST["comment"];

        $edit_name = @$_POST["edit"];
        
        $filename = "mission_3-4.txt";

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
        
        $file_array = file('mission_3-4.txt');

        foreach($file_array as $value){  
            $file_array_ex = explode( '<>', $value );
            $count = $file_array_ex[0];
        }
        ?>
        <form action="mission_3-4.php" method="POST" enctype="multipart/form-data">
            <select name="delete" id="delete">
            <?php
            for ($j = 1; $j <= $count; $j++) {
                print ('<option value="'.$j.'">'.$j.'</option>');
            }
            ?>
            </select>
            <input type="submit" value="削除"><br>
        </form>
        <form action="mission_3-4.php" method="POST" enctype="multipart/form-data">
            <select name="edit" id="edit">
            <?php
            for ($j = 1; $j <= $count; $j++) {
                print ('<option value="'.$j.'">'.$j.'</option>');
            }
            ?>
            </select>
            <input type="submit" value="編集"><br>
        </form>
        <?php
        
        if( isset($_POST["delete"]) ){
            $delete_name = @$_POST["delete"];

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
            if(!empty($name_edit) && !empty(@$comment_edit)){ 

                $fp = fopen($filename, "w");
                foreach($file_array as $value){  
                    $ex_file_array = explode( '<>', $value );
                    if( $ex_file_array[0] == $edit_name ){
                        fwrite($fp, $edit_name.'<>'.$name_edit.'<>'.$comment_edit.'<>'.$time."\n");
                    }
                    else{
                        fwrite($fp, $value);
                    }
                }
            }
            if( $edit_name == $file_array_ex[0] ){ //CAUTION!!!!!!

                echo ("<br>");
                echo ("<form action='mission_3-4.php' method='POST' enctype='multipart/form-data'>");
                echo ("名前：<input type='text' name='name_edit'>");
                echo ("<br>");
                echo ("コメント：<textarea name='comment_edit'></textarea>");
                echo ("<br>");
                echo ("<input type='submit' value='送信'>");
                echo ("<br>");
                echo ("</form>");
                echo ("<br>");
                
                $name_edit = @$_POST['name_edit'];
                $comment_edit = @$_POST['comment_edit'];

            }

            $cnt = 0;
        }
        ?>
    </body>
</center>
</html>



