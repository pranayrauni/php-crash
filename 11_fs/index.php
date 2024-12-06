<?php
// Magic constants - it changes its value based on execution context.

echo __DIR__.'<br>';     // directory btayga
echo __FILE__.'<br>';    // file   btayga


echo __LINE__.'<br>';    // line number btayga


// Create directory

// mkdir('hi');

// Rename directory

// rename('hi', 'hey');

// Delete directory

// rmdir('hey');

// Read files and folders inside directory

$files = scandir('./');

echo '<pre>';
var_dump($files);          // single dot is current dir and double dot is prev dir
echo '</pre>';


// file_get_contents, file_put_contents

echo file_get_contents('lorem.txt');

file_put_contents('sample.txt', "some content");

echo "<br>";
// file_get_contents from URL

$userJson = file_get_contents('https://jsonplaceholder.typicode.com/todos/1');  // print data using echo
echo $userJson;

$users = json_decode($userJson, true);   // use true to print as associative array

echo '<pre>';
var_dump($users);          
echo '</pre>';


// https://www.php.net/manual/en/book.filesystem.php
// file_exists
file_exists('sample.txt');

// is_dir

is_dir('test');

// filemtime - file modification time


// filesize - file size
// disk_free_space
// file