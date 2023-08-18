<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    pps: Array
})
</script>

<template>
    <Head title="Annual Procurement Plans" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Annual Procurement Plans</h2>
        </template>
        <template #subnav>
            <Link href="/procurement-plans/create" class="button1">Create Procurment Plan</Link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table>
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Period</th>
                                    <th>Preparation</th>
                                    <th>Remarks</th>
                                    <th class="text-center">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="pp in pps" :key="pp.id">
                                    <td>{{pp.title}}</td>
                                    <td>{{pp.period_start_str}} to {{ pp.period_end }}</td>
                                    <td>{{ pp.prep_start }} to {{ pp.prep_end }}</td>
                                    <td>{{ pp.remarks }}</td>
                                    <td class="text-center">
                                        <Link :href="'/procurement-plans/' + pp.id"><i class="fa fa-folder-open"></i></Link>
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
