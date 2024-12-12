<?php

// when there are many classes and dependent on each other then it is needed to write reqire_once on needed of class.
// Autoloading gives possibility to avoid writing require_once for class interfaces traits.

// composer is php dependency management tool. it gives ability to find packages and install using composer. 


// require_once "app/Email.php";
// require_once "app/Person.php";
// autoloading se sirf vendore/autoload.php h likhna hoga  
require_once "vendor/autoload.php";



use app\Email; 
use app\Person;

$email = new Email();
$person = new  Person();

$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');

echo $response->getStatusCode(); // 200
echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'  