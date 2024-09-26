<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-white text-gray-700 dark:bg-gray-900 dark:text-gray-300">
        <!-- Background Image -->
        <img id="background" class="absolute top-0 left-0 w-full h-full object-cover " src="https://i.pinimg.com/originals/2f/d1/73/2fd173d02f2c2e9b868de6fe70c2e747.jpg" />

        <!-- Main Container -->
        <div class="relative min-h-screen flex flex-col items-center justify-center py-10 px-4 sm:px-6 lg:px-8 selection:bg-[#FF2D20] selection:text-white">
            
            <!-- Header Section -->
            <header class="relative w-full max-w-3xl flex flex-col items-center mb-8">
                <div class="animated-title">
                    <span class="letter">W</span>
                    <span class="letter">E</span>
                    <span class="letter">B</span>
                    <span class="letter">C</span>
                    <span class="letter">H</span>
                    <span class="letter">A</span>
                    <span class="letter">T</span>
                </div>
            </header>

            <!-- Authentication Links -->
            <div class="relative flex justify-center items-center space-x-4">
                <Link
                    v-if="canLogin"
                    href="/login"
                    class="px-4 py-2 rounded-lg bg-black-600 text-white hover:bg-gray-500 transition duration-300">
                    Login
                </Link>
                <Link
                    v-if="canRegister"
                    href="/register"
                    class="px-4 py-2 rounded-lg bg-black-600 text-white hover:bg-gray-500 transition duration-300">
                    Register
                </Link>
            </div>
        </div>
    </div>
</template>

<style scoped>
body {
    font-family: 'Nunito', sans-serif;
    background-color: #f5f7fa;
}

.header-text {
    font-size: 1.5rem;
    font-weight: 700;
}

.auth-links {
    margin-top: 2rem;
}

.auth-link {
    margin: 0 0.5rem;
}
.animated-title {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 3rem; /* Ajuste o tamanho da fonte conforme necessário */
    font-weight: 700;
    color: #ffffff; /* Cor do texto */
    letter-spacing: 0.2rem;
}

.letter {
    display: inline-block;
    opacity: 0;
    transform: translateY(50px);
    animation: slide-in 0.5s ease forwards; /* Animação padrão */
}

/* Definindo a animação para cada letra */
@keyframes slide-in {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Aplicando atraso individualmente a cada letra */
.letter:nth-child(1) {
    animation-delay: 0.1s;
}

.letter:nth-child(2) {
    animation-delay: 0.2s;
}

.letter:nth-child(3) {
    animation-delay: 0.3s;
}

.letter:nth-child(4) {
    animation-delay: 0.4s;
}

.letter:nth-child(5) {
    animation-delay: 0.5s;
}

.letter:nth-child(6) {
    animation-delay: 0.6s;
}

.letter:nth-child(7) {
    animation-delay: 0.7s;
}

.letter:nth-child(8) {
    animation-delay: 0.8s;
}

</style>

