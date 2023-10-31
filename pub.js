const fs = require('fs');
const { google } = require('googleapis');

const apiKey = 'AIzaSyBQlxu6qe2cq3HjkL2larNuH--8IgS6zjQ'; // Substitua com sua chave de API do YouTube
const youtube = google.youtube({
  version: 'v3',
  auth: apiKey,
});

async function fetchYouTubeVideos() {
  try {
    const response = await youtube.search.list({
      part: 'snippet',
      maxResults: 89, // Ajuste o número de resultados desejado
      q: '#jazzghost', // Substitua 'termo_de_pesquisa' pelo que deseja pesquisar
    });

    const videos = response.data.items.map((video) => ({
      title: video.snippet.title,
      embedURL: `https://www.youtube.com/embed/${video.id.videoId}`,
    }));

    console.log('Vídeos encontrados:');
    videos.forEach((video, index) => {
      console.log(`#${index + 1} - Título: ${video.title}, URL: ${video.embedURL}`);
    });

    const outputFile = 'videos.json';
    fs.writeFileSync(outputFile, JSON.stringify({ videos }, null, 2));
    console.log(`Vídeos salvos em ${outputFile}.`);
  } catch (error) {
    console.error('Erro ao buscar vídeos do YouTube:', error);
  }
}

fetchYouTubeVideos();