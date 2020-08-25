<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-control-Allow-Methods: POST");
header("Allow-Access-Allow-Headers: Access-Control-Allow-Origin, Content-Type, Access-control-Allow-Methods, Authorization, X-Requested-Width");

require "../../services/mailer.php";

$data = json_decode(file_get_contents("php://input"));

$mailer = new Email();

$mailer->senderMail = $data->senderMail;
$mailer->senderName = $data->senderName;
$mailer->receiverEmail = $data->receiverEmail;
$mailer->receiverName = $data->receiverName;
$mailer->replyTo = $data->replyTo;
$mailer->subject = $data->subject;
$mailer->body = $data->body;
$mailer->altBody = $data->altBody;

if($data->token === "1w4@ka5q.#s!84ad^6Os0hs-Cjs#f9"){
    $mailer->send();
}
else throw new Exception;

