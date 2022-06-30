<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import DashboardLayout from '@/Backend/Layouts/DashboardLayout.vue';
import Pagination from '@/Shared/Pagination';

const props = defineProps({
    posts: Object
})

</script>
<template>
    <DashboardLayout title="All Posts">
        <h1 class="mb-8 text-3xl font-bold">All Posts</h1>
        <div class="flex items-center justify-between mb-6">
<!--            <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">-->
<!--                <label class="block text-gray-700">Trashed:</label>-->
<!--                <select v-model="form.trashed" class="form-select mt-1 w-full">-->
<!--                    <option :value="null" />-->
<!--                    <option value="with">With Trashed</option>-->
<!--                    <option value="only">Only Trashed</option>-->
<!--                </select>-->
<!--            </search-filter>-->
            <Link class="btn-indigo" :href="route('posts.create')">
                <span>Add</span>
                <span class="hidden md:inline">&nbsp;Post</span>
            </Link>
        </div>
        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="text-left font-bold">
                        <th class="pb-4 pt-6 px-6">Title</th>
                        <th class="pb-4 pt-6 px-6">Author</th>
                        <th class="pb-4 pt-6 px-6" colspan="2">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="post in posts.data" :key="post.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                        <td class="border-t">
                            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="route('posts.edit', post.id)">
                                {{ post.title }}
                            </Link>
                        </td>
                        <td class="border-t">
                            <Link class="flex items-center px-6 py-4" :href="route('profile.show', post.user.id )" tabindex="-1">
                                <span>{{ post.user.name }}</span>
                                <span class="hidden md:inline">&nbsp{{ post.user.second_name }}</span>
                            </Link>
                        </td>
                        <td class="border-t">
                            <Link class="flex items-center px-6 py-4" :href="route('posts.edit', post.id)" tabindex="-1">
                                <span>{{ post.status }}</span>
                            </Link>
                        </td>
                    </tr>
                    <tr v-if="posts.data.length === 0">
                        <td class="px-6 py-4 border-t" colspan="4">No posts found.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <Pagination class="mt-6" :links="posts.links" />
    </DashboardLayout>
</template>

