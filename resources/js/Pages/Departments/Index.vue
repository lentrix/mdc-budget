<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    depts: Array
})


</script>

<template>
    <Head title="Departments" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Departments</h2>
        </template>
        <template #subnav>
            <Link href="/departments/create" class="button1">Create Department</Link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Departent/Office</th>
                                    <th class="text-right">Budget Threshold</th>
                                    <th>In-charge</th>
                                    <th class="text-center">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="dept in depts" :key="dept.id">
                                    <td>{{ dept.name }}</td>
                                    <td class="text-right">{{ dept.formattedThreshold }}</td>
                                    <td>{{ dept.user.full_name }}</td>
                                    <td class="text-center">
                                        <Link :href="'/departments/' + dept.id">
                                            <i class="fa fa-folder-open"></i>
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
