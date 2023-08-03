<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'border-b border-gray-500 bg-gray-800 text-gray-400 py-4 px-6 w-full min-w-full hover:bg-gray-700 transition duration-300 ease-in-out'
        : 'border-b border-gray-500 text-gray-400 py-4 px-6 w-full min-w-full hover:bg-gray-700 transition duration-300 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
