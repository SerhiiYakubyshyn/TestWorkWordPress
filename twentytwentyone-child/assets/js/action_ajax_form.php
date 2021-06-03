<?php
if (isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["quantity"]) && isset($_POST["priceText"])) { 

	$message = '
        <html>
            <head>
                <title>Call me back</title>
            </head>
            <body>
                <p><b>Name:</b> '.$_POST['name'].'</p>
                <p><b>Phone:</b> '.$_POST['phone'].'</p> 
				<p><b>Quantity:</b> '.$_POST['quantity'].'</p>
				<p><b>Price:</b> '.$_POST['priceText'].'</p>
            </body>
        </html>';
	$to = $_POST['email'];
	$subject = 'Callback';
	$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers .= "From: Site <snappybuy.ua@gmail.com>\r\n"; 
	mail($to, $subject, $message, $headers); 
	
	$result = array(
    	'name' => $_POST["name"],
    	'phone' => $_POST["phone"]
    ); 
    echo json_encode($result);
}

?>
