<?php

function printStringReturnNumber(){
    echo "abc";
    return 1;
}

$my_num = printStringReturnNumber();
echo $my_num;

?>