<?php

// Create simple string

$first_name = 'pranay';
$last_name = "singh";

// dono m diff hai ki double comma wale k anadr direct variable likh denge to variable ka value print kar dega par single comma wale m inverted coomma k bahar likhna higa variable 

// String concatenation

echo $string = 'my first name is '.$first_name." and my last name is $last_name";

echo "<br>";

// String functions


$string1 = "   Hello World    ";;

echo "string length: ".strlen($string1)."<br>";

echo "trim: ".trim($string1)."<br>";

echo "left trim: ".ltrim($string1)."<br>";

echo "right trim: ".rtrim($string1)."<br>";

echo "string word count: ".str_word_count($string1)."<br>";

echo "string reverse: ".strrev($string1)."<br>";

echo "string uppercase: ".strtoupper($string1)."<br>";

echo "string lowercase: ".strtolower($string1)."<br>";

echo "lowercase first: ".lcfirst($string1)."<br>";

echo "uppercase first: ".ucfirst($string1)."<br>";

echo "uppercase words: ".ucwords($string1)."<br>";

echo "word search at position: ".strpos($string1, 'world')."<br>";

echo "word search at position, ignored case: ".stripos($string1, 'world')."<br>";

echo "sub string: ".substr($string1, 4)."<br>";

echo "string replace: ".str_replace('world', 'php', $string1)."<br>";

echo "string replace ignored case: ".str_ireplace('world', 'php', $string1)."<br>";




// Multiline text and line breaks


echo nl2br("hi im 
pranay");                     // new line ko br tag de deta .. jaise likha hai waise hi dikhega

echo "<br>";

echo nl2br("hi im 
<b>pranay</b>"); 

// Multiline text and reserve html tags
echo "<br>";

echo nl2br(htmlentities("hi im 
<b>pranay</b>"));             // html tags kuch nhi hoga

echo "<br>";

echo html_entity_decode('&lt&gt');
// https://www.php.net/manual/en/ref.strings.php