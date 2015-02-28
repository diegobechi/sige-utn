<!DOCTYPE html>
<html>
    <head>
	    <title>Send a Email | Envia un Correo</title>
    </head>
    <body> 
    	<?=form_open_multipart('http://localhost:8080/sige-utn/index.php/mailer/send_email')?>
    	<p>Name: <?=form_input('name');?></p>
		<p>Email: <?=form_input('email');?></p>
		<p>Subject: <?=form_input('subject');?></p>
		<p>Message: <?=form_textarea('message');?></p>
		<p><?=form_submit('submit', 'Send')?></p>
    	<?=form_close()?>
    </body>
</html>

