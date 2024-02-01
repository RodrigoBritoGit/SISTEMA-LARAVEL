<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 20px auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #333333;
    }

    p {
      color: #666666;
    }

    .footer {
      margin-top: 20px;
      text-align: center;
      color: #999999;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Venda Realizada</h1>
    <p>Olá {{ $mailData['clienteNome']}},</p>
    <p>Ficamos felizes em informar que a sua venda foi realizada com sucesso.</p>
    <p>Detalhes da venda:</p>
    <ul>
      <li><strong>Produto:</strong> {{ $mailData['produtoNome'] }}</li> 
      <li><strong>Preço:</strong> {{ $mailData['produtoValor'] }}</li>
    </ul>
    <p>Agradecemos pela sua compra. Se precisar de mais alguma informação, estamos à disposição.</p>

    <div class="footer">
      <p>Atenciosamente,<br>SITEMA GESTÃO</p>
    </div>
  </div>

</body>
</html>
