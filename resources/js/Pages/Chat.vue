<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import axios from "axios";
import Echo from "laravel-echo";
import io from "socket.io-client";
import moment from "moment";
import "moment-timezone";
export default {
	components: {
		AppLayout,
	},
	data() {
		return {
			users: [],
			messages: [],
			currentDate: new Date(),
			UserActive: null,
			message: "",
			socket: null,
			typingMessage: "", // Para armazenar a mensagem em partes
			fullMessage: "Selecione um usuário para iniciar a conversa.",
		};
	},
	computed: {
		formattedDate() {
			return (date) =>
				moment(date)
					.tz("America/Sao_Paulo")
					.format("HH:mm");
		},
		currentUser() {
			return this.$page.props.auth.user;
		},
	},
	methods: {
		typeMessage() {
			let index = 0;
			const typingInterval = setInterval(() => {
				if (index < this.fullMessage.length) {
					this.typingMessage += this.fullMessage[index];
					index++;
				} else {
					clearInterval(typingInterval); // Parar o temporizador quando toda a mensagem for exibida
				}
			}, 100); // Ajuste o tempo para controlar a velocidade da digitação
		},
		scrollToBottom() {
			this.$nextTick(() => {
				const messagesContainer = this.$el.querySelector(
					".messages-container"
				);
				if (messagesContainer) {
					messagesContainer.scrollTop =
						messagesContainer.scrollHeight;
				}
			});
		},
		loadMessages(UserId) {
			axios.get(`api/users/${UserId}`).then((response) => {
				this.UserActive = response.data;
			});
			axios.get(`api/messages/${UserId}`).then((response) => {
				this.messages = response.data.messages;
				this.scrollToBottom();
			});
		},
		sendMessage() {
			if (!this.message.trim()) {
				return;
			}
			axios
				.post("api/messages/store", {
					content: this.message,
					to: this.UserActive.User.id,
				})
				.then((response) => {
					this.messages.push({
						from: this.currentUser.id,
						to: this.UserActive.User.id,
						content: this.message,
						created_at: new Date().toISOString(),
						updated_at: new Date().toISOString(),
					});
					// Emitir a mensagem para o servidor
					this.socket.emit('sendMessage', {
						from: this.currentUser.id,
						content: this.message,
						to: this.UserActive.User.id,
						created_at: new Date().toISOString(),
					});
					this.scrollToBottom();
					this.message = "";
				})
				.catch((error) => {
					console.error("Erro ao enviar a mensagem:", error);
				});
		},
		listenForMessages() {
			this.socket.on('messageReceived', (message) => {
				if (message.from !== this.currentUser.id) { // Evitar mostrar a mesma mensagem que o usuário enviou
					this.messages.push({
						from: message.from,
						content: message.content,
						created_at: message.created_at,
					});
					console.log("Mensagem recebida via Socket.IO:", message);
					this.scrollToBottom();
				}
			});
		},
		beforeDestroy() {
			// Desconecte do servidor Socket.IO quando o componente for destruído
			if (this.socket) {
				this.socket.disconnect();
			}
		},
	},
	mounted() {
		this.socket = io("http://localhost:3005");
		this.listenForMessages();
		axios.get("api/users").then((response) => {
			this.users = response.data.users;
		});
		this.typeMessage();
	},
};
</script>
<style>
.messageFromMe {
	@apply bg-indigo-300 bg-opacity-25 text-right ml-auto;
}

.messageToMe {
	@apply bg-gray-600 bg-opacity-25 text-left mr-auto;
}

.message {
	@apply p-2 rounded-md mb-2;
}

.messages-container::-webkit-scrollbar {
	width: 8px;
}

.messages-container::-webkit-scrollbar-track {
	background: #f1f1f1;
	border-radius: 10px;
}

.messages-container::-webkit-scrollbar-thumb {
	background-color: #08d8fd79;
	border-radius: 10px;
	border: 2px solid transparent;
}

.messages-container::-webkit-scrollbar-thumb:hover {
	background-color: #08d8fd;
}

.users-container::-webkit-scrollbar {
	width: 8px;
}

.users-container::-webkit-scrollbar-track {
	background: #f1f1f1;
	border-radius: 10px;
}

.users-container::-webkit-scrollbar-thumb {
	background-color: #08d8fd79;
	border-radius: 10px;
	border: 2px solid transparent;
}

.users-container::-webkit-scrollbar-thumb:hover {
	background-color: #08d8fd;
}
</style>

<template>
	<AppLayout title="Dashboard">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Chat
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex" style="min-height: 400px; max-height: 400px">
					<!-- list users -->
					<div class="w-3/12 bg-gray-200 bg-opacity-25 border-r border-gray-200 overflow-y-scroll users-container">
						<ul>
							<li v-for="user in users" :key="user.id" @click="() => {
									loadMessages(user.id);
								}
								" :class="UserActive && UserActive.id == user.id
																		? 'bg-gray-200 bg-opacity-50'
																		: ''
																	"
								class="p-6 text-lg text-gray-600 leading-7 font-semibold border-b border-gray-200 hover:bg-gray-200 hover:bg-opacity-50 hover:cursor-pointer">
								<p class="flex items-center">
									{{ user.name }}
									<span class="ml-2 w-2 h-2 bg-blue-500 rounded-full"></span>
								</p>
							</li>
						</ul>
					</div>
					<!-- box messages -->
					<div class="w-9/12 flex flex-col justify-between">
						<div v-if="UserActive" class="w-full p-6 flex flex-col overflow-y-scroll messages-container">
							<div class="w-full mb-3 message" v-for="message in messages" :key="message.id" :class="message.from ==
									(currentUser && currentUser.id)
									? 'text-right'
									: ''
								">
								<p :class="message.from ==
										(currentUser && currentUser.id)
										? 'messageFromMe'
										: 'messageToMe'
									" class="inline-block p-2 rounded-md" style="max-width: 75%">
									{{ message.content }}
								</p>
								<span class="block mt-1 text-xs texte-gray-600">
									{{ formattedDate(message.created_at) }}
								</span>
							</div>
						</div>
						<div v-else class="w-full p-9 text-xl flex justify-center items-center text-stone-950 cursor-pointer">
							<p>{{ typingMessage }}</p>
						</div>
						<div v-if="UserActive" class="w-full bg-gray-200 bg-opacity-25 p-6 border-t border-gray-200">
							<form @submit.prevent="sendMessage">
								<div class="flex rounded-md overflow-hidden border border-gray-300">
									<input v-model="message" type="text" class="flex-1 px-4 py-2 text-sm focus:outline-none"
										style="border: none" />
									<button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white px-4 py-2">
										Enviar
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</AppLayout>
</template>
