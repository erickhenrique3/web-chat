<<<<<<< HEAD
<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o Projeto

Este projeto é uma aplicação de chat em tempo real utilizando **Laravel**, **Inertia.js**, **Vue.js**, **Jetstream** e **Socket.IO**. O objetivo é fornecer uma interface moderna e interativa para comunicação em tempo real.

## Tecnologias Utilizadas

- **Laravel**: Framework PHP para desenvolvimento backend.
- **Inertia.js**: Biblioteca para criar aplicações SPA (Single Page Application) com Laravel e Vue.js.
- **Vue.js**: Framework JavaScript para construção de interfaces de usuário.
- **Jetstream**: Pacote Laravel para autenticação e gerenciamento de equipe.
- **Socket.IO**: Biblioteca para comunicação em tempo real entre cliente e servidor.

## Pré-requisitos

Antes de começar, certifique-se de ter o seguinte instalado em sua máquina:

- PHP >= 8.0
- Composer
- Node.js >= 16
- NPM ou Yarn

## Instalação

1. **Clone o repositório:**

    ```bash
    git clone https://github.com/seu-usuario/seu-repositorio.git
    cd seu-repositorio
    ```

2. **Instale as dependências do Laravel:**

    ```bash
    composer install
    ```

3. **Configure o ambiente:**

    Copie o arquivo `.env.example` para `.env` e ajuste as configurações conforme necessário.

    ```bash
    cp .env.example .env
    ```

4. **Gere a chave de aplicação:**

    ```bash
    php artisan key:generate
    ```

5. **Instale as dependências do Node.js:**

    ```bash
    npm install
    ```

6. **Compile os assets:**

    ```bash
    npm run dev
    ```

7. **Configure o Socket.IO:**

    Instale o pacote Socket.IO no seu backend e frontend, se ainda não estiver instalado.

    **Backend (Laravel):**

    ```bash
    composer require beyondcode/laravel-websockets
    ```

    **Frontend (Vue.js):**

    ```bash
    npm install socket.io-client
    ```

8. **Configure o banco de dados e execute as migrações:**

    Ajuste as configurações do banco de dados em `.env` e execute as migrações:

    ```bash
    php artisan migrate
    ```

## Configuração do Socket.IO

1. **No Backend:**

    Adicione as configurações necessárias para o WebSocket no arquivo `config/websockets.php`.

    Configure o `broadcast` no seu arquivo `.env`:

    ```env
    BROADCAST_DRIVER=pusher
    PUSHER_APP_ID=your-pusher-app-id
    PUSHER_APP_KEY=your-pusher-app-key
    PUSHER_APP_SECRET=your-pusher-app-secret
    PUSHER_APP_CLUSTER=your-pusher-app-cluster
    ```

    Crie um evento para broadcast e defina suas regras no Laravel.

2. **No Frontend:**

    Configure o Socket.IO no seu componente Vue.js:

    ```javascript
    import io from 'socket.io-client';

    const socket = io('http://localhost:6001'); // URL do seu servidor WebSocket

    socket.on('chat-message', (message) => {
        console.log(message);
    });
    ```

## Uso

1. **Inicie o servidor Laravel:**

    ```bash
    php artisan serve
    ```

2. **Inicie o servidor Socket.IO:**

    ```bash
    php artisan websockets:serve
    ```

3. **Abra o navegador e acesse:**

    ```
    http://localhost:8000
    ```

4. **Use a interface de chat para enviar e receber mensagens em tempo real.**



## Licença

Este projeto está licenciado sob a [Licença MIT](https://opensource.org/licenses/MIT).

=======
##Chat em Tempo Real com Vue.js, Laravel e Socket.IO##
Este projeto é uma aplicação de chat em tempo real construída com Vue.js no frontend, Laravel no backend e Socket.IO para comunicação em tempo real.

Requisitos
Antes de iniciar, certifique-se de que você tenha os seguintes softwares instalados:

Node.js (versão 12 ou superior)
PHP (versão 7.4 ou superior)
Composer
MySQL ou outro banco de dados de sua escolha
Instalação
1. Clone o Repositório
Para começar, você precisa clonar este repositório para o seu ambiente de desenvolvimento local:
git clone https://github.com/usuario/nome-do-repositorio.git
cd nome-do-repositorio

2. Backend (Laravel)
2.1 Instale as Dependências
No diretório do projeto, execute o comando abaixo para instalar as dependências do Laravel:
composer install


>>>>>>> 1ca9879a25ea6cc526cf892953e09de8e0c49ff1
