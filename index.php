<html>
	<head>
		<meta charset="utf-8" />
    	<title>App Mail Send</title>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="shortcut icon" href="logo.png" type="image/x-icon">
		<style>
			textarea{
				resize:none;
			}
		</style>
	</head>
	<body>
		<div class="container">  
			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>
      		<div class="row">
      			<div class="col-md-12">
					<?php 
						if(isset($_GET["erro"])){
							echo "<div class='bg-warning btn'>";
							echo "<p class='font-weight-bold '>Erro. Campos não preenchidos no formulário ou tentativa de acesso indevida!</p>";
							echo "</div>";
						}
					?>
					<div class="card-body font-weight-bold">
						<form action="processaEmail.php" method="post">
							<div class="form-group">
								<label for="para">Para</label>
								<input type="email" name="para" class="form-control" id="para" placeholder="joao@dominio.com.br">
							</div>
							<div class="form-group">
								<label for="assunto">Assunto</label>
								<input type="text" name="assunto" class="form-control" id="assunto" placeholder="Assundo do e-mail">
							</div>
							<div class="form-group">
								<label for="mensagem">Mensagem</label>
								<textarea class="form-control" id="mensagem" name="mensagem"></textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
						</form>
					</div>
				</div>
      		</div>
      	</div>
	</body>
</html>