<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>System Dog World || Atualizar senha</title>


	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Page Title - SB Admin</title>
	<link href="css/styles.css" rel="stylesheet" />

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>


	<style>
		.css-selector {
			background: linear-gradient(34deg, #006bff, #2369ca, #003987, #122743, #01070f);
			background-size: 1000% 1000%;

			-webkit-animation: AnimationName 30s ease infinite;
			-moz-animation: AnimationName 30s ease infinite;
			animation: AnimationName 30s ease infinite;
		}

		@-webkit-keyframes AnimationName {
			0% {
				background-position: 87% 0%
			}

			50% {
				background-position: 14% 100%
			}

			100% {
				background-position: 87% 0%
			}
		}

		@-moz-keyframes AnimationName {
			0% {
				background-position: 87% 0%
			}

			50% {
				background-position: 14% 100%
			}

			100% {
				background-position: 87% 0%
			}
		}

		@keyframes AnimationName {
			0% {
				background-position: 87% 0%
			}

			50% {
				background-position: 14% 100%
			}

			100% {
				background-position: 87% 0%
			}
		}
	</style>

	<body class="css-selector" <?php include 'crud/banco.php';	?>>




		<div id="layoutAuthentication">
			<div id="layoutAuthentication_content">
				<main>
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-7">
								<div class="card shadow-lg border-0 rounded-lg mt-5">
									<div class="card-header">
										<h3 class="text-center font-weight-light my-3">Redefinir senha</h3>
									</div>
									<div class="card-body">

										<form action="crud/Envia_Senha.php" method="post" data-toggle="validator" role="form">
											<div class="form-row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="small mb-1" for="emailfun">Email</label>
														<input class="form-control py-4" id="emailfun" type="email" name="email" placeholder="Digite o E-mail" required />
													</div>
												</div>

											</div>
											<button type="submit" class="btn btn-primary " name="localizar"></i> Localizar</button>
											<br>
											<?php if (isset($_GET["sucesso"]) && $_GET["sucesso"] == 2) { ?>
												<br>
												<div class="alert alert-success">
													<?php
													echo "Uma nova senha foi envia para o seu email!";
													?>
												</div>
											<?php } else if (isset($_GET["erro"]) && $_GET["erro"] == 2) { ?>

												<div class="alert alert-danger">
													<?php
													echo "Erro ao atualizar";
													?>
												</div>
											<?php } ?>
											<?php if (isset($_GET["sucesso"]) && $_GET["sucesso"] == 1) { ?>

												<div class="card" style="width: 100%; margin-top:20px;">
													<div class="card" style="width: 100%; ">
														<div class="card-body">

															<table class="table">

																<tbody>

																	<tr>
																		<th scope="row">Nome Fantasia</th>
																		<td><?php echo $_SESSION["nome_fantasia"]; ?></td>

																	</tr>


																	<tr>
																		<th scope="row">CNPJ</th>
																		<td><?php echo $_SESSION["cnpj"]; ?></td>

																	</tr>
																</tbody>
															</table>


														</div>
													</div>

												</div>
												<div id="botoes" class="col-md-6 " style="left: 170px; margin: 10px;">
													<button type="submit" class="btn btn-success btn-lg" name="atualizar"></i> Enviar Nova Senha</button>

												</div>

											<?php } else if (isset($_GET["erroloc"]) && $_GET["erroloc"] == 1) { ?>

												<div class="alert alert-danger col-md-6">
													<?php

													echo "Não localizado!";

													?>
												</div>
											<?php } else if (isset($_GET["erro"]) && $_GET["erro"] == 3) { ?>
												<div class="alert alert-danger col-md-6">
													<?php

													echo "Verifique se as senha são identicas !";

													?>
												</div>
											<?php } ?>
											<br />


											<br>
											<a type="submit" class="btn btn-primary btn-lg btn-block" href="login2.php"><i class="fas fa-paw"></i>Fazer login </a>
										</form>
									</div>
									<div class="card-footer text-center">
										<div class="small">

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</main>
			</div>
			<div id="layoutAuthentication_footer">
				<footer class="py-4 bg-light mt-auto">
					<div class="container-fluid">
						<div class="d-flex align-items-center justify-content-between small">
							<div class="text-muted">Copyright &copy; Dog World Pet Shop</div>
							<div>
								<a href="#">Politica de privacidade</a> &middot;
								<a href="#">Termos &amp; Condoções</a>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
		
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="js/scripts.js"></script>
	</body>

	</html>