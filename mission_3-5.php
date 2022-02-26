<html>
<head>
  <meta name="viewport" content="width=320, height=480, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
	<meta charset="utf-8">
	<title>Test</title>
</head>
<center>
    <body>
        <?php

        $filename = 'mission_3-5.txt';
        
        if(@$_POST['send_delete']){

            $pass = @file($filename);
            $pass_keys = @explode("<>", @$pass[@$_POST['delete']-1]); 
            
            if(@$pass_keys[4] == @$_POST['delete_password']){
                 
                if(!empty($_POST['delete']) and $_POST['send_delete']){

                    $texts_delete = file($filename);
    
                    foreach($texts_delete as $key => $value){

                        $texts_delete_element = explode("<>", $value);
    
                        if($texts_delete_element[0] == @$_POST['delete']){
                            unset($texts_delete[$key]);
                        }

                        $count = $key + 1;
    
                    }
    
                    file_put_contents("mission_3-5.txt", $texts_delete);
    
                }
    
            }
            else if(ctype_digit($_POST['delete'])){
                echo "Error!";
                $texts_error = @file($filename);
                foreach((array)$texts_error as $value ){
                    $text_error = explode("<>", $value);
                    $count = $text_error[0];
                }
            }
            else{
                echo "Input digits";
                $texts_error = @file($filename);
                foreach((array)$texts_error as $value ){
                    $text_error = explode("<>", $value);
                    $count = $text_error[0];
                }
            }
    
        }
    
    
        if(@$_POST['send_edit']){

            $pass = @file($filename);
            $pass_keys = explode("<>", $pass[@$_POST['edit']-1]);
    
            if(@$pass_keys[4] == @$_POST['edit_password']){
    
                if(!empty($_POST['edit']) and $_POST['send_edit']){
    
                    $texts_edit = @file($filename);

                    foreach((array)$texts_edit as $key => $value ){

                        $text_edit = explode("<>", $value);

                        if($text_edit[0] == $_POST['edit']){

                            $edit_element_name = $text_edit[1];
                            $edit_element_come = $text_edit[2];

                        }
                        $count = $key + 1;
                    }
                }   
    
            }
            else{
                echo "error!";
                $texts_error = @file($filename);
                foreach((array)$texts_error as $value ){
                    $text_error = explode("<>", $value);
                    $count = $text_error[0];
                }
            }
        }
    
        if(@$_POST['number']){

            $pass = @file($filename);
            $pass_keys = explode("<>", @$pass[@$_POST['edit']-1]);
    
            if(@$pass_keys[4] == @$_POST['edit_password']){
                  
                if($_POST['number']){ 

                    $texts_edit = @file($filename);

                    foreach((array)$texts_edit as $key => $value ){

                        $text_edit = explode("<>", $value);

                        if($text_edit[0] == @$_POST['number']){
                            array_splice($texts_edit, $key, 1, @$_POST['number']."<>".@$_POST['name']."<>".@$_POST['comment']."<>".date("H/m/d G:i:s")."<>".@$_POST['pass_text']."<>"."\n");
                        }
                        $count = $key + 1;
                    }
                    file_put_contents("mission_3-5.txt", $texts_edit);
                }
            }
            else{
                echo "error!";
                $texts_error = @file($filename);
                foreach((array)$texts_error as $value ){
                    $text_error = explode("<>", $value);
                    $count = $text_error[0];
                }
            }
        }
    
        if(@$_POST['send'] and empty(@$_POST['number'])){
    
            $fp = fopen($filename,'a');
    
            $texts_comment = file($filename);
            $keys_comment = end($texts_comment);
    
            $keys_comment_ele = explode("<>", $keys_comment);
    
            $number = (int)$keys_comment_ele[0]+1;
            $count = (int)$keys_comment_ele[0]+1;
    
            $k = $number."<>".$_POST['name']."<>".$_POST['comment']."<>".date("H/m/d G:i:s")."<>".$_POST['pass_text']."<>";
    
            fwrite($fp,$k."\n");
            fclose($fp);
        }
    
        ?>

        <form action="mission_3-5.php" method="post">
            <p>name:<input type="text" name="name" value="<?php if(@$_POST['edit']){ echo @$edit_element_name; } ?>" placeholder="NAME"></p>
            <p>comment:<textarea name="comment" value="<?php if(@$_POST['edit']){ echo $edit_element_come; } ?>" placeholder="COMMENT" size="100"></textarea></p>
            <input type="hidden" name="number" value="<?php if(@$_POST['edit']){ echo $_POST['edit']; } ?>" >
            <p>password:<input type="text" name="pass_text" placeholder="PASSWORD"></p>
            <input type="submit" name="send" value="SEND">
        </form>

        <form action="mission_3-5.php" method="post">
            <p>
                <p><select name="delete" id="delete">
                <?php
                for ($j = 1; $j <= $count; $j++) {
                    print ('<option value="'.$j.'">'.$j.'</option>');
                }
                ?>
                </select></p>
                <p>password:<input type="text" name="delete_password" placeholder="PASSWORD"></p>
                <input type="submit" name="send_delete" value="DELETE">
            </p>
        </form>

        <form action="mission_3-5.php" method="post">
            <p>
                <p><select name="edit" id="edit">
                <?php
                for ($j = 1; $j <= $count; $j++) {
                    print ('<option value="'.$j.'">'.$j.'</option>');
                }
                ?>
                </select></p></p>
                <p>password:<input type="text" name="edit_password" placeholder="PASSWORD"></p>
                <input type="submit" name="send_edit" value="EDIT">
            </p>
        </form>

        <?php
        
        $filename = 'mission_3-5.txt';
        $texts_export = file($filename);
    
        foreach((array)$texts_export as $text_export){
            
            $keys_export = explode("<>",$text_export);
            $keys_export_num = count($keys_export);
      
            foreach( $keys_export as $key => $value ){
        
                if( $key !== $keys_export_num-2 ){
                    echo $value." ";
                }   
                $count = $key + 1;
            }
            echo "<br>";
    }
    ?>
    </body>
</center>
</html>



