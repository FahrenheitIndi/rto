<script setup>
import { Link, usePage } from '@inertiajs/inertia-vue3';
import {onMounted} from "vue";
// import Popper from 'vue3-popper';

const isURL = (...urls) => {
    let currentUrl = route().current();
    if (urls[0] === '') {
        return currentUrl === '';
    }
    return urls.filter((url) => currentUrl.startsWith(url)).length;
};
onMounted( () => {
    console.log(
        usePage().component,
        usePage().url.value.substring(1),
    )
})
</script>
<template>
    <ul>
        <li>
            <Link class="group flex items-center py-3" :href="route('posts.index')">
<!--                <Popper hover placement="right" arrow>-->
<!--                    <button>Posts</button>-->
<!--                    <template #content>-->
<!--                      -->
<!--                    </template>-->
<!--                </Popper>-->
                <span :class="isURL('post') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Posts</span>
            </Link>
            <Link class="group flex flex-col items-start py-3 " :href="route('general.index')">
                <span :class="$page.url.startsWith('/admin/settings') ? 'text-white' : 'text-indigo-300 group-hover:text-white'">Settings</span>
                <ul :class="$page.url.startsWith('/admin/settings') ? 'w-full block group-hover:text-white pt-4 pb-4 pl-1' : 'hidden'">
                    <li>
                        <Link :href="route('users.index')">
                          <span :class="$page.component.startsWith('Users') ? 'text-white' : 'text-indigo-300 hover:text-white'">Users</span>
                        </Link>
                    </li>
                    <li class="mt-4">
                        <Link :href="route('roles.index')">
                            <span :class="$page.component.startsWith('Roles') ? 'text-white' : 'text-indigo-300 hover:text-white'">User Role Editor</span>
                        </Link>
                    </li>
                </ul>
            </Link>
        </li>
    </ul>
</template>
