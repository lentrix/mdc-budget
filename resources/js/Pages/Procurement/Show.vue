<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    pp: null
})
</script>

<template>
    <Head :title="'Annual Procurement Plan: ' + pp?.title" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Annual Procurement Plan: {{pp?.title}}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Department/Office</th>
                                    <th>Budget Threshold</th>
                                    <th>Current Allocation</th>
                                    <th>Prepared by</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
