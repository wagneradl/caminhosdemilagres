<?php

	$erros = array();

	// Verifica se o nome foi inserido
	if (!isset($_POST['nome'])) {
		$erros['nome'] = 'Por favor, insira seu nome';
	}

	// Verifica se o email foi inserido e é válido
	if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$erros['email'] = 'Por favor, insira um endereço de email válido';
	}

	// Verifica se a mensagem foi inserida
	if (!isset($_POST['mensagem'])) {
		$erros['mensagem'] = 'Por favor, insira sua mensagem';
	}

	$saidaErro = '';

	if(!empty($erros)){

		$saidaErro .= '<div class="alert alert-danger alert-dismissible" role="alert">';
 		$saidaErro .= '<button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>';

		$saidaErro  .= '<ul>';

		foreach ($erros as $chave => $valor) {
			$saidaErro .= '<li>'.$valor.'</li>';
		}

		$saidaErro .= '</ul>';
		$saidaErro .= '</div>';

		echo $saidaErro;
		exit();
	}

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];
	$de = $email;
	$para = 'wagneradl@me.com';  // altere este email para o desejado
	$assunto = 'Formulário de Contato: Caminhos de Milagres';

	$corpo = "De: $nome\n E-Mail: $email\n Mensagem:\n $mensagem";

	$cabecalhos = "De: ".$de;

    // Enviar o email
    if (mail($to, $subject, $body, $headers)) {
        echo '<div class="alert alert-success alert-dismissible" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>';
        echo 'Mensagem enviada com sucesso!';
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>';
        echo 'Ops! Algo deu errado. Tente novamente mais tarde.';
        echo '</div>';
    }
?>

