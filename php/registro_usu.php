<?php	
	session_start();
	$cod_tema=$_REQUEST['cod_tema'];
	$documento=htmlentities($_POST['numero_documento']);
	$contrasena = htmlentities(generar_password_complejo(8));
	$email=$_POST['email'];
	$telefono=$_POST['telefono'];
	include("..\PHPMailer\PHPMailer.php");
	include("..\PHPMailer\SMTP.php");
	include("..\PHPMailer\Exception.php");
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;
	
	
	include('conexion.php');

	$guardar=$conexion->query("insert into ingresar(nom_usu,ape_usu,id_usu,numero_documento,pas_usu,ema_usu,tel_usu,admin)values ('','','$documento','$documento','$contrasena','$email',$telefono,0);");


	if ($guardar) {
		//mkdir("../imagenes_usu/$documento", 0700);
		$mail = new PHPMailer(true);

		try {

			$mail->isSMTP();
			$mail->Host       = 'ssl://smtp.gmail.com';
			$mail->SMTPAuth   = true;
			$mail->Username   = 'duvan4234@gmail.com';
			$mail->Password   = 'wrygqzluzvftfhop';  
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);    
			$mail->Port       = 465;

			//Recipients
			$mail->setFrom('duvan4234@gmail.com', 'D&D Sofware');
			$mail->addAddress($email);
		


			//Content
			$mail->isHTML(true);
			$mail->Subject = 'Datos de ingreso';
			$msg = '<table border="0">
			<thead>
			<tr>
				<th colspan="2">D&D Software</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td colspan="2">Bienvenido a D&D Software los datos para el ingreso son:</td>
			</tr>
			<tr>
				<td>Usuario:</td>
				<td>'.$documento.'</td>
			</tr>
			<tr>
				<td>Contrasena:</td>
				<td>'.$contrasena.'</td>
			</tr>
			<tbody>
		</table>';			
			$mail->Body    = $msg;
	



			$mail->send();
			echo'<script language="javascript">alert("Usuario creado correctamente, a su correo se enviara el usuario y contraseña para el ingreso");location.href="../login.php?cod_tema='.$cod_tema.'";</script>';

		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}		

 	}else{
		echo"<script>alert('El usuario ya existe');location.href ='javascript:history.back()';</script>";
 	}

	 function generar_password_complejo($largo){
		$cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$cadena_base .= '0123456789' ;
		$cadena_base .= '#*+';
	  
		$password = '';
		$limite = strlen($cadena_base) - 1;
	  
		for ($i=0; $i < $largo; $i++)
		  $password .= $cadena_base[rand(0, $limite)];
	  
		return $password;
	  }	 
?>