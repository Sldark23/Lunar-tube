<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="./css/global.css" />
    <link rel="stylesheet" href="./css/login.css" />
    <title>Entre ou cadastre-se</title>
  </head>
  <body>
    <main>
      <section class="painel-login">
        <div class="card">
          <form action="login_usuario.php" method="POST">
            <h1>Entre ou cadastre-se</h1>
            <input type="email" name="email" placeholder="E-mail" />
            <input type="password" name="senha" placeholder="Senha" />
            <button type="submit">Entrar</button>
            <a href="./cadastro.php">Ainda não tem cadastro? Clique aqui</a>
          </form>
        </div>
      </section>

      <section class="painel-imagem">
        <img src="./images/login.svg" alt="Login" />
      </section>
    </main>
  </body>
</html>
