<?php
    $Shiritori = array("しりとり", "りんご", "ごりら", "らっぱ", "ぱんだ");
    
    $shiritori_chain = $Shiritori[0];
    foreach( $Shiritori as $value ){
        echo $shiritori_chain;
        echo '<br>';
        $shiritori_chain = $shiritori_chain.$value;
    }
?>