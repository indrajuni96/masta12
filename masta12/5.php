<?php
    function count_vowels($param){
        echo preg_match_all('/[aeiou]/i',$param);
        
    }
   
    count_vowels("programmer");
    echo "<br>";
    count_vowels("hmm..");
?>