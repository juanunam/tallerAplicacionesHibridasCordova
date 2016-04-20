<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Formulario</title> <!-- Aquí va el título de la página -->

</head>

<body>
<?php
//require './includes/PHPMailerAutoload.php';
if($_POST['submit']=="contacto"){
	contacto();
}else{
//	facturacion();
}



function contacto(){
	$Nombre = $_POST['Nombre'];
	$Correo = $_POST['Correo'];
	$Mensaje = $_POST['Mensaje'];
	$Telefono = $_POST['Telefono'];
	$Asunto = $_POST['Asunto'];

	if ($Nombre=='' || $Correo=='' || $Mensaje==''){

		echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

	}else{


	    require("./includes/PHPMailerAutoload.php");
	    $mail = new PHPMailer();
			$mail->isSMTP();
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$mail->SMTPDebug = 2;
			//Ask for HTML-friendly debug output
			$mail->Debugoutput = 'html';
			//Set the hostname of the mail server
			$mail->Host = 'smtp.gmail.com';
			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			$mail->Port = 587;
			//Set the encryption system to use - ssl (deprecated) or tls
			$mail->SMTPSecure = 'tls';
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;
			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = "carlosgonzagular@gmail.com";
			//Password to use for SMTP authentication
			$mail->Password = "DEDE123456";

	    $mail->setFrom("carlosgonzagular@gmail.com.mx",$Nombre); //Dirección desde la que se enviarán los mensajes. Debe ser la misma de los datos de el servidor SMTP.
	  //  $mail->FromName = $Nombre;
	    $mail->AddAddress("carlosgonzagular@gmail.com", "carlosgonzagular@gmail.com");

	// Dirección a la que llegaran los mensajes.

	// Aquí van los datos que apareceran en el correo que reciba

	   //  $mail->WordWrap = 50;
	  //  $mail->IsHTML(true);
	    $mail->Subject  =  "Contacto : $Asunto";
	    $mail->MsgHTML("Nombre: $Nombre \n<br />".
	    "Email: $Correo \n<br />".
	    "Tel: $Telefono \n<br />".
	    "Mensaje: $Mensaje \n<br />");



    if ($mail->Send())
    	echo "<script>alert('Formulario Enviado');location.href ='javascript:history.back()';</script>";
    else
    //	echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";
			 echo "Mailer Error: " . $mail->ErrorInfo;
    }
}


?>
</body>
</html>
