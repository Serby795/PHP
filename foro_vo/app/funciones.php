<?php

function userCheck($user, $password) :bool {
   $check = false;
   if (strlen($user) >= 8 && $password == strrev($user)){
      $check = true;
   }

   return $check;
   
    
}


function convertInjectedCode($string){
   
   return htmlspecialchars($string);
}


function countWords($string) {

   $words = str_word_count($string,1);
   $wordsCount = array_count_values($words);
   asort($wordsCount);
   $mostRepeated = array_key_last($wordsCount);

   return $mostRepeated;
}


function countChars($string){
   $array_string = str_split($string);
   $chars = array_count_values($array_string);
   asort($chars);
   $mostRepeated = array_key_last($chars);

   return $mostRepeated;
}
