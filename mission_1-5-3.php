<?php
    $age = 18;
    if($age >= 18 && $age < 85){
        echo "自動車免許が取れます";
    }
    else if($age >= 85){
        echo "免許を返納しませんか？";
    }
    else{
        echo "自動車免許はまだ取得できません";
    }
?>