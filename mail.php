<?php

	header('Content-type: application/json');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    $request = json_decode(file_get_contents("php://input"));
    $email_subject = "Zefirek : ".$request->person_name;

    $email_body = '<html><body>';
    $email_body .= "<p><strong>Imie i nazwisko: </strong>$request->person_name</p><p><strong>Email:</strong> $request->email</p>
                    <p>$request->message</p>";
    $email_body .= '</body></html>';

    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $headers .= "From: $request->email\n";
    $headers .= "Reply-To: $request->email";

    mail('agazefirek@wp.pl',$email_subject,$email_body,$headers);

?>