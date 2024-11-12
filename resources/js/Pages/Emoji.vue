<template>
  <div class="emoji-dashboard">
    <div class="emoji-container">
      <span class="emoji" @click="sendEmoji('🔥')">🔥</span>
      <span class="emoji" @click="sendEmoji('🚀')">🚀</span>
      <span class="emoji" @click="sendEmoji('💚')">💚</span>
    </div>
    <div v-for="(emoji, index) in emojis" :key="index" class="emoji-float" :style="{ top: emoji.y + 'px', left: emoji.x + 'px' }">
      {{ emoji.symbol }}
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { ref, onMounted } from 'vue';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

export default {
  name: 'EmojiDashboard',
  setup() {
    
    const emojis = ref([]);

    // const sendEmoji = (emoji) => {
    
    //   axios.post('api/emoji', { emoji })
    //     .then(() => addFloatingEmoji(emoji));
    // };
    const sendEmoji = (emoji) => {
      const userId = localStorage.getItem('userId');  
      axios.post('api/emoji', { emoji, userId })
        .then(() => addFloatingEmoji(emoji))
        .catch(error => console.error("Erro ao enviar emoji:", error));
        reaction();

    };

    const reaction = () => {
      window.Echo.channel(`emoji-reactions`)
        .listen('EmojiReactionAdded', (event) => {
          console.log(event);
        });
    };

    const addFloatingEmoji = (emoji) => {
      const x = Math.random() * window.innerWidth;
      const y = window.innerHeight - 100;

      emojis.value.push({ symbol: emoji, x, y });

      setTimeout(() => {
        emojis.value.shift();
      }, 2000);
    };

    onMounted(() => {
      reaction();
    });

    return { emojis, sendEmoji };
  }
};
</script>

<style scoped>
body {
  background-color: #1a1a1a;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
  overflow: hidden;
}

.emoji-dashboard {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.emoji-container {
  background-color: rgba(255, 255, 255, 0.15);
  border-radius: 12px;
  padding: 20px;
  display: flex;
  justify-content: space-around;
  width: 350px;
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
}

.emoji {
  font-size: 2.5rem;
  cursor: pointer;
  transition: transform 0.2s, color 0.2s;
  color: #ffffff;
}

.emoji:hover {
  transform: scale(1.3);
  color: #f39c12;
}

.emoji-float {
  position: absolute;
  font-size: 2rem;
  animation: floatUp 2.5s ease-in-out forwards;
  text-shadow: 0 0 8px rgba(255, 255, 255, 0.8);
}

@keyframes floatUp {
  0% { opacity: 1; transform: translateY(0); }
  100% { opacity: 0; transform: translateY(-120px); }
}
</style>
