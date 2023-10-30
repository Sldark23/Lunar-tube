<?php
  session_start();
  // Se não existir um valor no indice 'nome', entao encerre a aplicação;
  if (!isset($_SESSION['nome'])) {
    header('Location: index.php'); //Protege a página Home
    exit;
  } else {
    $conn = mysqli_connect("localhost", "root", "", "sistema");

    $postagens= $conn->query("SELECT * FROM postagens JOIN usuarios WHERE fk_usuario=id ORDER BY id_postagens DESC");

  }
?>
text-light" type = "submit">Publicar</button>
  </form>

  <?php
  if($postagens->num_rows > 0){
  foreach ($postagens as $postagem){

  ?>

    <div class="card mt-5">
      <div class="card-header">
        <img class="rounded-circle" src="<?php echo $postagem['imagem']?>" alt="<?php echo $postagem['nome'] ?>">
        <h5 class="ml-3 mb-0"><?php echo $postagem['nome'] ?></h5>
      </div>

      <div class="card-body">
        <?php echo $postagem["conteudo"] ?>
      </div>
    </div>
  
  <?php }} ?>

<!DOCTYPE html>
<html>
<head>
    <title>LunarTube - Seu Site de Vídeos</title>
    <style>
        /* Estilos para a página com o tema LunarTube */
        body {
            background-color: #1f1f1f; /* Fundo escuro */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #ffffff; /* Texto branco */
        }

        header {
            background-color: #181818; /* Cor de fundo do cabeçalho escuro */
            color: #ffffff; /* Cor do texto do cabeçalho branco */
            padding: 20px;
            text-align: center;
        }

        #search-bar {
            text-align: center;
            padding: 20px;
        }

        #video-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .video-card {
            margin: 20px;
            padding: 10px;
            border: 1px solid #292929; /* Borda mais clara */
            border-radius: 5px;
            width: 300px;
            background-color: #292929; /* Cor de fundo do card */
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>LunarTube - Seu Site de Vídeos</h1>
    </header>
<header class="container-fluid border shadow">
  <nav class="row container m-auto">
    <div class="col-10 d-flex align-items-center">
      <img class="rounded-circle" src="<?php echo $_SESSION['imagem']?>" alt="<?php echo $_SESSION['nome'] ?>">
      <h5 class="ml-3 mb-0"><?php echo $_SESSION['nome'] ?></h5>
    </div>

    <div class="col-2 d-flex align-items-center justify-content-end">
      <div class="dropdown">
        <button class="btn text-white rounded-circle dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="perfil.php">Meu perfil</a>
          <a class="dropdown-item" href="sair.php">Sair</a>
        </div>
      </div>
    </div>
  </nav>
</header>
    <div id="search-bar">
        <input type="text" id="search-input" placeholder="Pesquisar vídeos">
        <button onclick="searchVideos()">Pesquisar</button>
    </div>

    <div id="video-container">
        <!-- Vídeos serão exibidos aqui pelo JavaScript -->
    </div>

    <script>
        // JavaScript do sistema de recomendação
        const videos = []; // Armazena todos os vídeos do arquivo videos.json

        document.addEventListener("DOMContentLoaded", function() {
            fetch('videos.json')
                .then(response => response.json())
                .then(data => {
                    videos.push(...data.videos); // Armazena os vídeos no array
                    displayVideos(videos);
                })
                .catch(error => {
                    console.error('Erro ao carregar os vídeos:', error);
                });
        });

        // Função para pesquisar vídeos com base no termo digitado na barra de pesquisa
        function searchVideos() {
            const searchTerm = document.getElementById('search-input').value.toLowerCase();
            const filteredVideos = videos.filter(video => video.title.toLowerCase().includes(searchTerm));
            displayVideos(filteredVideos);
        }

        // Função para exibir vídeos no contêiner de vídeo
        function displayVideos(videosToDisplay) {
            const videoContainer = document.getElementById('video-container');
            videoContainer.innerHTML = '';

            videosToDisplay.forEach(video => {
                const videoCard = document.createElement('div');
                videoCard.className = 'video-card';

                const videoTitle = document.createElement('h2');
                videoTitle.textContent = video.title;

                const videoEmbed = document.createElement('iframe');
                videoEmbed.width = '280';
                videoEmbed.height = '160';
                videoEmbed.src = video.embedURL;
                videoEmbed.frameborder = '0';
                videoEmbed.allowFullscreen = true;

                videoCard.appendChild(videoTitle);
                videoCard.appendChild(videoEmbed);

                videoContainer.appendChild(videoCard);
            });
        }
    </script>
</body>
  </html>