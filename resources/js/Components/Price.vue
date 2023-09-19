<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    regularPrice: Number,
    customPrice: Number,
    remarks: String
})

</script>

<template>
    <span v-if="regularPrice==customPrice">{{ customPrice?.toLocaleString() }}</span>
    <span v-else class="text-red-700 cursor-pointer" :title="remarks">{{ customPrice?.toLocaleString() }}</span>
</template>
