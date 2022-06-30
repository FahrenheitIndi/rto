<script setup>
import DashboardLayout from "@/Backend/Layouts/DashboardLayout";
import GeneralSettings from "./Partials/GeneralSettings";
</script>
<template>
    <DashboardLayout title="Settings">
        <h1 class="mb-8 text-3xl font-bold">Settings</h1>
        <div class="bg-white rounded-md shadow overflow-x-auto">
            <GeneralSettings />
        </div>
    </DashboardLayout>
</template>
