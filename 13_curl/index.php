<?php

// curl is  a tool which gives possibility to interact remotely to other services. 
//  example - to get6 information from following url we use curl.
// we can also use filegetcontent but sometimes it doesnot work for security reasons. it also does not work if we want to pass additional headers.


$url = 'https://jsonplaceholder.typicode.com/users';


// Sample example to get data.

$resource = curl_init($url);
curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($resource);    // result is user json

// to get status code use getinfo
$info = curl_getinfo($resource);    // ye bahut sari information dega

$code = curl_getinfo($resource, CURLINFO_HTTP_CODE);  // ststus code dega

echo '<prev>';
var_dump($code);
echo '<br>';
var_dump($info);

echo '</pre>';
echo '<br>';

echo $result;

// after curl execution we should call curlclose
curl_close($resource);   // after thgis we can not get any info.



// Get response status code

// set_opt_array

// Post request
//  here we gonna create post rewquest to create a user at the endpoint of api

$resource = curl_init();

$user = [
    'name' => 'pranay singh',
    'username' => 'pranay',
    'email' => 'pranay@pranay.com'
];


curl_setopt_array($resource, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ['content-type: application/json'],
    CURLOPT_POSTFIELDS => json_encode($user)
]);

$result = curl_exec($resource);
curl_close($resource);
echo $result;


