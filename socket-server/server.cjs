const http = require('http');
const socketIo = require('socket.io');

// Cria um servidor HTTP
const httpServer = http.createServer((req, res) => {
  res.writeHead(200, { 'Content-Type': 'text/plain' });
  res.end('Olá Mundo\n');
});

// Anexa o Socket.IO ao servidor HTTP
const io = socketIo(httpServer, {
    cors: {
        origin: ["http://localhost:8080", "http://127.0.0.1:8000"],
        methods: ["GET", "POST"]
    }
});

// Escuta por conexões
io.on('connection', (socket) => {
  console.log('Um usuário se conectou');

  socket.on('sendMessage', (message) => {
    console.log('Mensagem recebida no servidor:', message);
    io.emit('messageReceived', message); // Emite a mensagem para todos os clientes
});
  
  socket.on('disconnect', () => {
    console.log('Usuário desconectado');
  });
});

// Inicia o servidor HTTP
const PORT = 3005;
httpServer.listen(PORT, () => {
  console.log(`Servidor está ouvindo na porta ${PORT}`);
});
