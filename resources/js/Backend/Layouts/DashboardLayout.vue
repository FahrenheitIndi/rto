<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue';
import JetDropdownLink from '@/Jetstream/DropdownLink.vue';
import Icon from "@/Components/Icon";
import Dropdown from "@/Components/Dropdown";
import MainMenu from "@/Components/MainMenu";

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const logout = () => {
    Inertia.post(route('logout'));
};
</script>

<template>
    <div>
        <Head :title="title" />
        <div class="md:flex md:flex-col">
            <div class="md:flex md:flex-col md:h-screen">
                <div class="md:flex md:flex-shrink-0">
                    <div class="bg-indigo-900 md:flex-shrink-0 md:w-56 px-6 py-4 flex items-center justify-between md:justify-center">
                        <Link class="mt-1" :href="route('dashboard')">
                            <JetApplicationMark class="block h-9 w-auto" />
                            <!-- <logo class="fill-white" width="120" height="28" /> -->
                        </Link>
                        <template class="md:hidden">
                            <Dropdown>
                                <template #default>
                                    <svg class="w-6 h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" /></svg>
                                </template>
                                <template #dropwdown>
                                    <div class="mt-2 px-8 py-4 bg-indigo-800 rounded shadow-lg">
                                        <MainMenu />
                                    </div>
                                </template>
                            </Dropdown>
                        </template>
                    </div>
                    <div class="bg-white border-b w-full p-4 md:py-0 md:px-12 text-sm md:text-md flex justify-between items-center">
                        <div class="mr-4 mt-1">{{ title }}</div>
                        <Dropdown class="mt-1">
                            <template #default>
                                <div class="group flex items-center cursor-pointer select-none">
                                    <div class="mr-1 text-gray-700 group-hover:text-indigo-600 focus:text-indigo-600 whitespace-nowrap">
                                        <span>{{ $page.props.user.name }}</span>
                                        <span class="hidden md:inline">&nbsp;{{ $page.props.user?.second_name }}</span>
                                    </div>
                                    <Icon class="w-5 h-5 fill-gray-700 group-hover:fill-indigo-600 focus:fill-indigo-600" name="test"/>
                                    <!-- <icon class="w-5 h-5 fill-gray-700 group-hover:fill-indigo-600 focus:fill-indigo-600" name="cheveron-down" /> -->
                                </div>
                            </template>
                            <template #dropdown>
                                <div class="mt-2 py-2 text-sm bg-white rounded shadow-xl">

                                    <JetDropdownLink :href="route('profile.show')">
                                        Profile
                                    </JetDropdownLink>

                                    <div class="border-t border-gray-100" />

                                    <!-- Authentication -->
                                    <form @submit.prevent="logout">
                                        <JetDropdownLink as="button">
                                            Log Out
                                        </JetDropdownLink>
                                    </form>
                                </div>
                            </template>
                        </Dropdown>
                    </div>
                </div>
                <div class="md:flex md:flex-grow md:overflow-hidden">
                    <MainMenu class="hidden flex-shrink-0 p-12 w-56 bg-indigo-800 overflow-y-auto md:block" />
                    <div class="px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto" scroll-region>
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
