<?php 
    function  printTriangle($nilai){
        if($nilai == 3){
            for ($i = 1; $i <= $nilai; $i++) {
                for ($j = 1; $j <= $i; $j++) {
                    // echo "\n";
                    echo "<center>";
                }
                for ($k = $i; $k <= $nilai; $k++) {
                    if($k==3 && $i==2){
                        echo "&nbsp;&nbsp;";
                    }else{
                       
                    echo "*"; 
                    }
                }
                for ($l = $i + 1; $l <= $nilai; $l++) {
                    echo "*";
                }
                echo "\n";
            }
        }elseif($nilai == 5){
            for ($i = 1; $i <= $nilai - 1; $i++) {
                for ($j = 1; $j <= $i; $j++) {
                    // echo "\n";
                    echo "<center>";
                }
                for ($k = $i; $k <= $nilai; $k++) {
                    if($k==3 && $i==2 || $k==4 && $i==2 || $k==5 && $i==2){
                        echo "&nbsp;&nbsp;";
                    }elseif($k==4 && $i==3){
                        echo "&nbsp;&nbsp;&nbsp;";
                    }elseif($k==5 && $i==4){
                        echo "&nbsp;";
                    }else{               
                     echo "*"; 
                    }
                }
                for ($l = $i + 1; $l <= $nilai - 2; $l++) {
                    echo "*";
                    
                }
                echo "\n";
            }
        }
    }

    echo "<center> printTriangle(3) <br>";
    printTriangle(3);
    echo "<br><br><br>";
    echo "<center> printTriangle(5) <br>";
    printTriangle(5);

?>