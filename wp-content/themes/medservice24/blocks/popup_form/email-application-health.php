<?php 
	//$_POST
	$email_client = $_POST['email'];
	$name_client = $_POST['name'];
	$tel_client = $_POST['tel'];
	$messages_client = $_POST['messages'];
	$years_client = $_POST['years'];
	$month_client = $_POST['month'];
	$date_client = $_POST['date'];
	$time_client = $_POST['time'];
	$doctor_child_client = $_POST['doctor_child'];
	$doctor_home_client = $_POST['doctor_home'];
	
	$content_doctor_child_client = '';
	$content_doctor_home_client = '';
	if($doctor_home_client == 'on'){
		$content_doctor_home_client='<tr>
				<td style="color: #5b5b5b; font:14px/18px Arial, Helvetica, sans-serif;border-bottom:1px solid #eaeaea; padding:15px 0;">
					<span style="color: #004e94; font-weight:bold;text-transform:uppercase;">Вызов врача на дом:</span> <br>
					Да
				</td>
			</tr>';
	}
	if($doctor_child_client == 'on'){
		$content_doctor_child_client='<tr>
				<td style="color: #5b5b5b; font:14px/18px Arial, Helvetica, sans-serif;border-bottom:1px solid #eaeaea; padding:15px 0;">
					<span style="color: #004e94; font-weight:bold;text-transform:uppercase;">Врач для ребенка:</span> <br>
					Да
				</td>
			</tr>';
	}
	//
	
	$email = get_field('email');
	$location_address_email = get_field('location_address');
	$email_title_post = $post->post_title;
	$to  = "$email";
	$subject = "Запись на прием";
	$message = '
	<html>
		<head>
			<title>Med советник 24</title>
			<style type="text/css">
				* {
					-webkit-text-size-adjust: none;
					-webkit-text-resize: 100%;
					-ms-text-size-adjust:100%;
					text-resize: 100%;
				}
				td{border-collapse:collapse !important;}
				a{outline:none;}
				a:hover{text-decoration:none !important;}
				.btn:hover{opacity:0.8;}
				.btn{
					-webkit-transition:all 0.25s ease;
					-ms-transition:all 0.25s ease;
					transition:all 0.25s ease;
				}
				img{margin: 0 !important;}
			</style>
		</head>
		<body style="margin:0;padding:0;" bgcolor="#f2f2f2" link="#004e94">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr><td colspan="3" class="fix-gmail" style="min-width:800px; font-size:0; line-height:0;">&nbsp;</td></tr>
				<tr>
					<td width="50%" bgcolor="#f2f2f2"></td>
					<td width="700">
						<table width="700" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center" style="text-align:center;padding:30px"><a href="'.home_url().'"><img src="'.get_template_directory_uri().'/images/email/logo.png" width="160" alt="Med советник 24" style="vertical-align:top" border="0"></a></td>
							</tr>
							<tr>
								<td style="padding:30px;background:#fff;">
									<table cellspacing="0" cellpadding="0">
										<tr>
											<td style="color: #5b5b5b; font:14px/18px Arial, Helvetica, sans-serif;padding:0 0 20px;">
												<span style="color: #004e94; font-weight:bold;text-transform:uppercase;">'.$email_title_post.'</span><br><br>
												Адрес: '.$location_address_email['address'].'
											</td>
										</tr>
										<tr>
											<td style="color: #5b5b5b; font:14px/18px Arial, Helvetica, sans-serif;border-bottom:1px solid #eaeaea; padding:15px 0;">
												<span style="color: #004e94; font-weight:bold;text-transform:uppercase;">Имя:</span> <br>
												'.$name_client.'
											</td>
										</tr>
										<tr>
											<td style="color: #5b5b5b; font:14px/18px Arial, Helvetica, sans-serif;border-bottom:1px solid #eaeaea; padding:15px 0;">
												<span style="color: #004e94; font-weight:bold;text-transform:uppercase;">Телефон:</span> <br>
												'.$tel_client.'
											</td>
										</tr>
										<tr>
											<td style="color: #5b5b5b; font:14px/18px Arial, Helvetica, sans-serif;border-bottom:1px solid #eaeaea; padding:15px 0;">
												<span style="color: #004e94; font-weight:bold;text-transform:uppercase;">Email:</span> <br>
												<a target="_blank" href="'.$email_client.'" style="text-decoration:none; color:#f99d32;">'.$email_client.'</a>
											</td>
										</tr>
										<tr>
											<td style="color: #5b5b5b; font:14px/18px Arial, Helvetica, sans-serif;border-bottom:1px solid #eaeaea; padding:15px 0;">
												<span style="color: #004e94; font-weight:bold;text-transform:uppercase;">Дата записи:</span> <br>
												Время: '.$time_client.' | Дата: '.$date_client.' '.$month_client.' '.$years_client.'
											</td>
										</tr>
										'.$content_doctor_home_client.'
										'.$content_doctor_child_client.'
										<tr>
											<td style="color: #5b5b5b; font:14px/18px Arial, Helvetica, sans-serif;border-bottom:1px solid #eaeaea; padding:15px 0;">
												<span style="color: #004e94; font-weight:bold;text-transform:uppercase;">Коментарий:</span> <br>
												'.$messages_client.'
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="padding:20px 30px; text-align:center">
									<table cellspacing="0" cellpadding="0" align="center" style="text-align:center">
										<tr>
											<td style="color: #5b5b5b; font:14px/18px Arial, Helvetica, sans-serif;padding:0 0 15px;">Copyright 2016 Med советник 24. All Rights Reserved.</td>
										</tr>
										<tr>
											<td>
												<table cellspacing="0" cellpadding="0" align="center" style="text-align:center">
													<tr>
														<td style="padding:0 5px; font-size:0; line-height:0"><a href="#"><img src="'.get_template_directory_uri().'/images/email/ico-linkedin.png" width="34" alt="Linkedin" style="vertical-align:top" border="0"></a></td>
														<td style="padding:0 5px; font-size:0; line-height:0"><a href="#"><img src="'.get_template_directory_uri().'/images/email/ico-google.png" width="34" alt="Google+" style="vertical-align:top" border="0"></a></td>
														<td style="padding:0 5px; font-size:0; line-height:0"><a href="#"><img src="'.get_template_directory_uri().'/images/email/ico-twitter.png" width="34" alt="Twitter" style="vertical-align:top" border="0"></a></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td width="50%" bgcolor="#f2f2f2"></td>
				</tr>
			</table>
		</body>
	</html>';
	$headers  = "Content-Type: text/html; charset=utf-8 \r\n";
	$headers .= "From: Med советник 24 - $email_title_post <$email_client>\r\n";
	$headers .= "Bcc: $email_client\r\n";
	mail($to, $subject, $message, $headers);
	
	if(!empty($_POST)){ echo '<p>Ваша заявка обрабатывается, в скором времени с вами свяжеться наш представитель!</p>';}
?>


