<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import DashboardLayout from '@/Backend/Layouts/DashboardLayout';

const props = defineProps({
    users: Object
})

</script>
<template>
    <DashboardLayout title="Users">
        <h1 class="mb-8 text-3xl font-bold">All Users</h1>
        <div class="flex items-center justify-between mb-6">
            <!--            <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">-->
            <!--                <label class="block text-gray-700">Trashed:</label>-->
            <!--                <select v-model="form.trashed" class="form-select mt-1 w-full">-->
            <!--                    <option :value="null" />-->
            <!--                    <option value="with">With Trashed</option>-->
            <!--                    <option value="only">Only Trashed</option>-->
            <!--                </select>-->
            <!--            </search-filter>-->
            <button class="btn-indigo" @click="createUser">
                <span>Add</span>
                <span class="hidden md:inline">&nbspUser</span>
            </button>
        </div>
        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="text-left font-bold">
                        <th class="pb-4 pt-6 px-6">Name</th>
                        <th class="pb-4 pt-6 px-6">Email</th>
                        <th class="pb-4 pt-6 px-6">Role</th>
                        <th class="pb-4 pt-6 px-6" colspan="2">Posts</th>
                    </tr>
                </thead>
                <tbody>
                <tr v-for="user in users.data" :key="user.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="route('profile.show', user.id)">
                            <span>{{ user.name }}</span>
                            <span class="hidden md:inline">&nbsp{{ user.second_name }}</span>
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" :href="route('profile.show', user.id )" tabindex="-1">
                            <span>{{ user.email }}</span>
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" :href="route('profile.show', user.id )" tabindex="-1">
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-blue-600 bg-blue-200 uppercase last:mr-0 mr-1">Role</span>
                        </Link>
                    </td>
                    <td class="border-t">
                        <Link class="flex items-center px-6 py-4" :href="route('posts.edit', user.id)" tabindex="-1">
                            <span>{{ user.posts_count }}</span>
                        </Link>
                    </td>
                </tr>
                <tr v-if="users.data.length === 0">
                    <td class="px-6 py-4 border-t" colspan="4">No users found.</td>
                </tr>
                </tbody>
            </table>
        </div>
    </DashboardLayout>
</template>
