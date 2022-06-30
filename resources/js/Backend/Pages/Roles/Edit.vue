<script setup>
import DashboardLayout from '@/Backend/Layouts/DashboardLayout';

const props = defineProps({
    role: Object
})
</script>
<template>
    <DashboardLayout title="Edit Role">
        {{ role }}
    </DashboardLayout>
</template>
