<script setup>
import {onMounted, ref, watch, nextTick, onUnmounted} from "vue";
import Popper from 'vue3-popper';

const popperSettings = {
    arrow: true
}
</script>
<template>
    <Popper :options="popperSettings">
        <button type="button"><slot></slot></button>
        <template #content>
            <slot name="dropdown"></slot>
        </template>
    </Popper>
</template>
