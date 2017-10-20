<?php 
	$email = get_field('email');
	$email_client = $_POST['email'];
	$location_address_email = get_field('location_address');
	$email_title_post = $post->post_title;
	$to  = "$email";
	$subject = "Задать вопрос";
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
												'.$_POST['name'].'
											</td>
										</tr>
										<tr>
											<td style="color: #5b5b5b; font:14px/18px Arial, Helvetica, sans-serif;border-bottom:1px solid #eaeaea; padding:15px 0;">
												<span style="color: #004e94; font-weight:bold;text-transform:uppercase;">Телефон:</span> <br>
												'.$_POST['tel'].'
											</td>
										</tr>
										<tr>
											<td style="color: #5b5b5b; font:14px/18px Arial, Helvetica, sans-serif;padding:15px 0;">
												<span style="color: #004e94; font-weight:bold;text-transform:uppercase;">Email:</span> <br>
												<a target="_blank" href="'.$_POST['email'].'" style="text-decoration:none; color:#f99d32;">'.$_POST['email'].'</a>
											</td>
										</tr>
										<tr>
											<td style="color: #5b5b5b; font:14px/18px Arial, Helvetica, sans-serif;">
												'.$_POST['messages'].'
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

