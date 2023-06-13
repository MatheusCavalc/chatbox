<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import ChatBar from '@/Components/ChatBar.vue'
import AuthUserOptions from '@/Components/AuthUserOptions.vue'
import axios from 'axios';

const props = defineProps(['chats'])
const emit = defineEmits(['sendMessages', 'sendChatId', 'sendUserInfos'])

const showBar = ref(false)

const searchBar = () => {
    showBar.value = !showBar.value
}

const messages = (chatId, user) => {
    axios.post('/messages', {
        chatId: chatId,
    }).then((response) => {
        console.log(response)
        emit('sendMessages', response)
        emit('sendChatId', chatId)
        emit('sendUserInfos', user)
    }).catch(error => {
        console.log(error)
    });
}

const page = usePage()
const user = computed(() => page.props.auth.user)
</script>

<template>
    <section class="flex flex-col justify-center antialiased bg-gray-50 text-gray-600 min-h-screen p-4">
        <div class="h-full">
            <div class="relative max-w-[340px] mx-auto bg-white shadow-lg rounded-lg">

                <div class="mb-2 py-3 px-4">
                    <AuthUserOptions />
                </div>

                <Transition>
                    <div class="mb-2 py-3 px-4" v-show="showBar">
                        <ChatBar />
                    </div>
                </Transition>


                <div class="py-3 px-5">
                    <h3 class="text-xs font-semibold uppercase text-gray-400 mb-1">Chats</h3>
                    <div class="divide-y divide-gray-200">
                        <div v-for="chat in chats" :key="chat.id">
                            <button v-if="chat.user_1.id == user.id"
                                class="w-full text-left py-2 focus:outline-none focus-visible:bg-indigo-50">
                                <div @click="messages(chat.id, chat.user_2)" class="flex items-center">
                                    <img class="rounded-full items-start flex-shrink-0 mr-3"
                                        src="https://res.cloudinary.com/dc6deairt/image/upload/v1638102932/user-32-01_pfck4u.jpg"
                                        width="32" height="32" alt="Marie Zulfikar" />
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-900">{{ chat.user_2.name }}
                                        </h4>
                                        <div class="text-[13px]">The video chat ended · 2hrs</div>
                                    </div>
                                </div>
                            </button>
                            <button v-else class="w-full text-left py-2 focus:outline-none focus-visible:bg-indigo-50">
                                <div @click="messages(chat.id, chat.user_1)" class="flex items-center">
                                    <img class="rounded-full items-start flex-shrink-0 mr-3"
                                        src="https://res.cloudinary.com/dc6deairt/image/upload/v1638102932/user-32-01_pfck4u.jpg"
                                        width="32" height="32" alt="Marie Zulfikar" />
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-900">{{ chat.user_1.name }}
                                        </h4>
                                        <div class="text-[13px]">The video chat ended · 2hrs</div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>


                <!-- Bottom right button -->
                <button @click="searchBar"
                    class="absolute bottom-5 right-5 inline-flex items-center text-sm font-medium text-white bg-indigo-500 hover:bg-indigo-600 rounded-full text-center px-3 py-2 shadow-lg focus:outline-none focus-visible:ring-2">
                    <svg class="w-3 h-3 fill-current text-indigo-300 flex-shrink-0 mr-2" viewBox="0 0 12 12">
                        <path
                            d="M11.866.146a.5.5 0 0 0-.437-.139c-.26.044-6.393 1.1-8.2 2.913a4.145 4.145 0 0 0-.617 5.062L.305 10.293a1 1 0 1 0 1.414 1.414L7.426 6l-2 3.923c.242.048.487.074.733.077a4.122 4.122 0 0 0 2.933-1.215c1.81-1.809 2.87-7.94 2.913-8.2a.5.5 0 0 0-.139-.439Z" />
                    </svg>
                    <span>New Chat</span>
                </button>


            </div>
        </div>
    </section>
</template>

<style>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.3s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
