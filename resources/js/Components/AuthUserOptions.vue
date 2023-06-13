<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
</script>

<template>
    <div class="flex sm:items-center justify-between">
        <div>
            <h3 class="text-xs font-semibold uppercase text-gray-400">Chat App</h3>
        </div>

        <div>
            <Dropdown align="right" width="48">
                <template #trigger>
                    <span class="inline-flex rounded-md cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                        </svg>
                    </span>
                </template>

                <template #content>
                    <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                    <DropdownLink :href="route('logout')" method="post" as="button">
                        Log Out
                    </DropdownLink>
                </template>
            </Dropdown>
        </div>

    </div>
</template>
