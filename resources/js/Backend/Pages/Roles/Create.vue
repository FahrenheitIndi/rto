<script setup>
import DashboardLayout from '@/Backend/Layouts/DashboardLayout';
import CreateRoleForm from './Partials/CreateRoleForm'

const props = defineProps({
    permissions: Object
});

</script>
<template>
    <DashboardLayout title="New Role">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <CreateRoleForm :permissions="permissions"></CreateRoleForm>
        </div>
    </DashboardLayout>
</template>
