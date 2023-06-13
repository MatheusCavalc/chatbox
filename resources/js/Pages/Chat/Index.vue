<script setup>
import ChatField from '@/Components/ChatField.vue';
import ChatCard from '@/Components/ChatCard.vue';
import { ref } from 'vue'

const props = defineProps(['chats'])

const messagesChat = ref([])
const idchat = ref('')
const infosuser = ref('')

const addMessages = (messages) => {
    messagesChat.value = messages;
}

const chatId = (chatId) => {
    idchat.value = chatId
}

const userInfos = (infosUser) => {
    infosuser.value = infosUser
}

//console.log(page.props.auth.user)
</script>

<template>
    <div class="grid grid-cols-4 gap-4">

        <div>
            <ChatCard :chats="props.chats" @send-chat-id="chatId" @send-messages="addMessages" @send-user-infos="userInfos"/>
        </div>

        <div class="col-span-3">
            <ChatField :chatId="idchat" :messages="messagesChat" :userInfos="infosuser"/>
        </div>
    </div>
</template>
