<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="./css/global.css" />
    <link rel="stylesheet" href="./css/cadastro.css" />
    <title>Cadastre-se</title>
  </head>
  <body>
    <main>
      <div class="painel-cadastro">
        <div class="card">
          <form action="cadastro_usuario.php" method="POST">
            <h1>Cadastre-se</h1>
            <input type="text" name="nome" placeholder="Digite o seu nome" />
            <input type="url" name="imagem" placeholder="Imagem" />
            <input type="email" name="email" placeholder="Digite o seu e-mail" />
            <input type="password" name="senha" placeholder="Digite a sua senha" />
            <input type="password" name="conf_senha" placeholder="Confirme a sua senha" />
            <button type="submit">Cadastre-se</button>
            <a href="./index.php">Já possui cadastro? Realize o login.</a>
          </form>
        </div>
       </div>
    </main>
  </body>
</html>
