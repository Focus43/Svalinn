<?php defined('C5_EXECUTE') or die("Access Denied.");
/** @var $formData stdObject : Request data from the form submission */

$subject  = 'Svalinn.com: Contact Form Submission';
$template = <<< heredoc
<html>
	<head>
		<title>Svalinn.com: Contact Form</title>
		<style type="text/css">
			body {margin:0;padding:0;font-family:Arial;font-size:13px;font-weight:normal;line-height:120%;}
			body {-webkit-text-size-adjust:none;}
			table td {border-collapse:collapse;}
			h1, .h1 {padding-top:0;padding-bottom:10px;font-family:Arial;font-size:22px;font-weight:normal;line-height:100%;}
			p, .p {font-size:12px;line-height:130%;}
			blockquote, .blockquote {font-size:14px;}
		</style>
	</head>
	<body style="background-color:#f5f5f5;" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
		<center>
			<br /><br />
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" style="height:100% !important;margin:0;padding:0;width:100% !important;">
				<tr>
					<td valign="top">
						<center>
							<h1 class="h1">Svalinn.com: Contact Form</h1>
							<table cellpadding="0" cellspacing="0" width="600" style="background-color:#fff;border:1px solid #ccc;">
								<tr>
									<td valign="top">
										<table border="0" cellpadding="10" cellspacing="0" width="600">
											<tr>
												<td>
													<p class="p"><strong>Name:</strong> {$formData->name}</p>
													<p class="p"><strong>Email:</strong> {$formData->email}</p>
													<p class="p"><strong>Phone:</strong> {$formData->phone}</p>
													<p class="p"><strong>City:</strong> &#36;{$formData->city}</p>
													<hr>
													<p class="p"><strong>Client Type:</strong> {$formData->client_type}</p>
													<hr>
													<p class="p"><strong>Client Type:</strong> {$formData->other_pets}</p>
													<hr>
													<p class="p"><strong>About Yourself:</strong> {$formData->about_yourself}</p>
													<hr>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</center>
					</td>
				</tr>
			</table>
			<br /><br />
		</center>
	</body>
</html>
heredoc;

$bodyHTML = t($template);