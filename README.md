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



## Configuração do Frontend com Socket.IO

1. **Configure o Socket.IO no seu componente Vue.js:**

    Instale o cliente Socket.IO:

    ```bash
    npm install socket.io-client
    ```

## Uso

1. **Inicie o servidor Laravel:**

    ```bash
    php artisan serve
    ```

2. **Inicie o servidor Socket.IO:**

    ```bash
    node server-cjs.js
    ```

3. **Abra o navegador e acesse:**

    ```
    http://127.0.0.1:8000
    ```

4. **Use a interface de chat para enviar e receber mensagens em tempo real.**



## Licença

Este projeto está licenciado sob a [Licença MIT](https://opensource.org/licenses/MIT).
