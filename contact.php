<?php

require 'vendor/autoload.php';

$apiKey = "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";

$email = new \SendGrid\Mail\Mail();
$email->setFrom($_POST['email'], "Contact Form");
$email->setSubject("[NEW] ");
$email->addTo("athanasios.tsepas@gmail.com", "Thanasis Tsepas");
$email->addContent(
	"text/html",
	"<h1>Contact Form Email</h1>" .
	"<div>Name: " . $_POST['name'] . "<div>" .
	"<div>Email: " . $_POST['email'] . "<div>" .
	"<div>Message: " . $_POST['message'] . "<div>"
);

$sg = new \SendGrid($apiKey);

try {
	$response = $sg->send($email);

	header("location: /?success=" . $response->statusCode());
} catch (Exception $e) {
	header("location: /?success=0");
}
