<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
    email: null
})

function submit() {
    router.post('/create-conversation', form)
}
</script>

<template>
    <h3 class="text-xs font-semibold uppercase text-gray-400 mb-3">Search new chattings</h3>

    <form @submit.prevent="submit">
        <input type="text" placeholder="Put email's friend" id="email" v-model="form.email"
            class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-50 rounded-full py-1">
    </form>
</template>
