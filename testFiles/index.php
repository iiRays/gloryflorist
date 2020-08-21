<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logger = new Logger('SimpleLogger');
$logger->pushHandler(new StreamHandler(__DIR__.'/server.log', Logger::DEBUG));

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];

    $logMsg = "Subscription; user: " . $name . " email: " . $email . PHP_EOL;
    $logger->info($logMsg);
    
    subscribe($name, $email);
}

function subscribe($name, $email) {
    // subscription logic here
}
?>

<form method="post" style="margin-top: 100px; margin-left: auto; margin-right: auto; text-align: center;">
    <div>
	<label for="name">Name:</label>
	<input type="text" id="name" name="name">
    </div>
    <div>
	<label for="email">E-mail:</label>
	<input type="email" id="email" name="email">
    </div>
    <div>
	<button type="submit" name="submit">Subscribe</button>
    </div>
</form>