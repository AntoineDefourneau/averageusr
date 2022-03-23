<?php

include 'auth.php';
include 'generate.php';

$parameters = [
    'status' => generateSentence()
];

$result = $connection->post('statuses/update', $parameters);


?>
