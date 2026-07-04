<?php
    //Configuração do email
    $destinatario = "davi.alexandremlk8@gmail.com";
    $assunto = "Vá se lasca!";
    $remetente = "davi.alexandremlk8@gmail.com";
    $respoderPara = "davi.alexandremlk8@gmail.com";

    //Cabeçalho do email
    $headers = "From" . $remetente . "\r\n";
    $headers .= "Reply-To: " . $respoderPara . "\r\n";
    $headers .= "MINE-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    //Mensagem do email HTML
    $mensagem = "
        <div style='max-width: 600px; margin: 20px auto; background-color: #ffffff; border: 1px solid #dee2e6; border-radius: 8px; padding: 20px;'>

        <div style='backgroud-color: #007bff; color: #ffffff; padding: 20px; text-align: center; border-radius: 9px 8px 0 0;'>
            <h1 style='margin: 0; font-size: 24px;'>Bem-vindo à nossa Plataforma!</h1> 
        </div>

        <div style='padding: 20px; text-align: center;'>
            <p style='font-size: 18px; color: #212529;'>
                Estamos tristes em tê-lo(a) conosco.
                Acesse nossa plataforma e comece a explorar todos os recursos disponíveis para você.
            </p>
            <a href='#' padding: 12px 30px; margin-top: 17px; font-size: 16px; color: #000000; background-color: #056b1c; text-decoration: none; border-radius: 5px;'>
                Acessar Plataforma
            </a>
        </div>

        <div style='text-align: : center; font-size: 15px; color: #6c757d; margin-top: 40px;'>
            <p>Atenciosamento,<\br>Vá tomar banho!</p>
            <p>¢ 2026 Plataforma. Todos os direitos reservados.</p>
        </div>
    ";

    //Enviando o email - Função mail
    mail($destinatario, $assunto, $mensagem, $headers);
?>