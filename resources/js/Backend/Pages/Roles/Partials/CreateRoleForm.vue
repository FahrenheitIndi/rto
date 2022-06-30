<script setup>
import { groupBy } from 'lodash';
import { computed } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import JetFormSection from '@/Jetstream/FormSection.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetInputError from '@/Jetstream/InputError.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetActionMessage from '@/Jetstream/ActionMessage.vue';
import JetButton from '@/Jetstream/Button.vue';

const props = defineProps({
    permissions: {
        type: Object,
        required: true
    }
});

const permissionsGroupByCategory =  computed( () => {
    return groupBy( props.permissions, 'category')
});

const form = useForm({
    _method: 'PUT',
    name: '',
});

const createNewRole = () => {};

</script>
<template>
    <JetFormSection @submitted="createNewRole">
        <template #title>
            Role
            <pre>
                {{ groupPermissions }}
            </pre>
        </template>
        <template #description>
            Create new role and select permissions
        </template>
        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="name" value="Name" />
                <JetInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="name"
                />
                <JetInputError :message="form.errors.name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <ul>
                    <li v-for="(rights, permissionGroupName) in permissions">
                        <h3>{{ permissionGroupName.charAt(0).toUpperCase() + permissionGroupName.slice(1) }}</h3>
                        <ul>
                            <li v-for="law in rights" :key="law.id">
                                <JetLabel :for="law.name" :value="law.name" />
                                <JetInput type="checkbox" :value="law.name" />
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </template>
        <template #actions>
            <JetActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </JetActionMessage>

            <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </JetButton>
        </template>
    </JetFormSection>
</template>
