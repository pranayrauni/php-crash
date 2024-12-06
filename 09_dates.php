<?php

// Print current date
echo date('y-m-d h:i:s').'<br>';
// Print yesterday

echo date('y-m-d h:i:s', time() - 24*60*60).'<br>';

// Different format: https://www.php.net/manual/en/function.date.php

    echo date('F j Y h:i:s').'<br>';

// Print current timestamp

echo time().'<br>';    // seconds from first jan 1970

// Parse date: https://www.php.net/manual/en/function.date-parse.php

$parsedDate = date_parse('2024-12-11 5:00:00');

echo '<pre>';
var_dump($parsedDate);
echo '</pre>';

// Parse date from format: https://www.php.net/manual/en/function.date-parse-from-format.php

$dateString = 'Feb 4 2024 12:34:32';

$parsedDate = date_parse_from_format('F j Y h:i:s', $dateString);

echo '<pre>';
var_dump($parsedDate);
echo '</pre>';