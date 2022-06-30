<script setup>
import {onMounted} from "vue";
import svg4everybody from 'svg4everybody';
const props = defineProps({
    name: {
        type : String,
        required: true,
        default: '',
    }
});
onMounted( () => svg4everybody() );
</script>
<template>
    <svg>
        <use :xlink:href="props.name" />
    </svg>
</template>
