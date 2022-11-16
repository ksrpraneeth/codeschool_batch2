<?php
$name='chinmaya biswal room mate';
$n='biswal';

//php semicolon is required at end of the each line
echo $name;#display the variavle value of the string
echo '<br>';
echo strlen($n);#count the length of string
echo '<br>';
echo str_word_count($name);#count the number of words in a string
echo '<br>';
echo strrev($name);#reverse a string 
echo '<br>';
/*to calculate the position of asub string in a particular string we use the function 
strpos(string position in another string) .it returns the first counter position of that particular substring in the main string*/ 
echo strpos($name,$n);#to find the position particular substring
echo '<br>';
echo str_replace($n,'hari',$name);#replace a particular substring with the given substring
?>