<script setup>
import { ref } from "vue";
import { Link } from '@inertiajs/inertia-vue3';
import DashboardLayout from '@/Backend/Layouts/DashboardLayout';

const props = defineProps({
    roles: Object,
})

</script>
<template>
    <DashboardLayout title="User Roles">
        <h1 class="mb-8 text-3xl font-bold">Roles</h1>
        <div class="flex items-center justify-between mb-6">
            <Link class="btn-indigo" as="button" type="button" :href="route('roles.create')">
                <span>Add</span>
                <span class="hidden md:inline">&nbspRole</span>
            </Link>
        </div>
        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="text-left font-bold">
                        <th class="pb-4 pt-6 px-6">Role</th>
                        <th class="pb-4 pt-6 px-6">Users</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="role in roles.data" :key="role.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                        <td class="border-t">
                            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="route('roles.edit', role.id)">
                                <span>{{ role.name }}</span>
                            </Link>
                        </td>
                        <td class="border-t">
                            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="route('roles.edit', role.id)">
                                <span>{{ role.users_count }}</span>
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </DashboardLayout>
</template>
