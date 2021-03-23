<?php

    $email = $_POST['email']; 
	$address = $_POST['address'];
	$name = $_POST['name'];
	$comments = $_POST['comments'];
    $phone = $_POST['phone'];
    

	
    
    $body = $email . $address . $name . $comments . $phone;
    echo $body;
    $subject = "Customer Support Mail";;
    /* $subject = "Request sent successfully..."; */
    

    $headers = array(
        'Authorization: Bearer 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',
        'Content-Type: application/json'
    );

    $data = array(
        "personalizations" => array(
            array(
                "to" => array(
                    array(
                        "email" => "dineshkumars.18it@kongu.edu"
                    )
                )
            )
        ),
        "from" => array(
            "email" => "dineshbolt16@gmail.com" 
        ),
        "subject" => $subject,
        "content" => array(
            array(
                "type" => "text/html",
                "value" => $body
            )
        )
    );


	$ch = curl_init() ;
	curl_setopt($ch,  CURLOPT_URL,  "https://api.sendgrid.com/v3/mail/send");
	curl_setopt($ch,  CURLOPT_POST ,  1 );
	curl_setopt($ch,  CURLOPT_POSTFIELDS ,json_encode($data));
	curl_setopt($ch,  CURLOPT_HTTPHEADER , $headers );
	curl_setopt($ch,  CURLOPT_FOLLOWLOCATION,  1);
	curl_setopt($ch,  CURLOPT_RETURNTRANSFER,  1);

	$response = curl_exec($ch);
	curl_close($ch);
    
    echo $response;

    header("location:contactus.html?mail=success");
?>
