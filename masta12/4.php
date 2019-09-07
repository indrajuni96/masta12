<?php

    // Function untuk membagi 3 bagian dengan pembatas -
    function bagianNumber($bagian){
        $num_result = strlen($bagian);
        $arrResult = array();
        $mulai = 0;

        for($n=0;$n<6;$n++){   
            if($mulai == 12 || $mulai == 14){
                $sub_result = substr($bagian,$mulai,2);
                $mulai = $mulai+2;
            }else{
                $sub_result = substr($bagian,$mulai,3);
                $mulai = $mulai+3;
            }            
          
             $arrResult[] =  $sub_result;//masukan ke array
             
        }
            $pisahKoma = implode("-",$arrResult);//array  ke string
            
            echo $pisahKoma ;
    }

    //Function untuk menghilakan spasi dan -
    function groupNumber($n){
         $exN = explode(" ",$n); //string Ke array
         $imN = implode("",$exN);//array  ke string

         $exN2 = explode("-",$imN); //string Ke array
         $imN2 = implode("",$exN2);//array  ke string

        bagianNumber($imN2);
    }

    groupNumber("993141 -1 1323 14-232");
?>