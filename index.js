const express = require('express');
const app = express();
const port = 3000;

// Configure o middleware para servir arquivos estáticos da pasta 'public'
app.use(express.static('public'));

app.listen(port, () => {
    console.log(`Servidor rodando na porta ${port}`);
});