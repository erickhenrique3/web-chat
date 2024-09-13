import Echo from 'laravel-echo';
import io from 'socket.io-client';

// Atribui o cliente Socket.IO ao Echo
window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: 'http://localhost:3005',
    client: io,
});
