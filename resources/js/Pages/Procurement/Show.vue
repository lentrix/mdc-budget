<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

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
            <div class="mx-auto sm:px-6 lg:px-8 sm:flex justify-between">
                <div class="flex-1 px-6">
                    <div class="bg-white rounded shadow p-6">
                        <h4 class="text-xl">Departmental Appropriations</h4>
                        <hr>
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
                <div style="min-width: 400px!important;">
                    <div class="bg-white rounded shadow p-6">
                        <h4 class="text-xl">Procurement Plan Details</h4>
                        <hr>
                        <div class="bg-blue-100 p-2 rounded">
                            <div class="italic font-bold text-sm">
                                Title
                            </div>
                            <div class="pl-4">{{ pp.title }}</div>
                        </div>

                        <div class="bg-blue-100 p-2 rounded mt-3">
                            <div class="italic font-bold text-sm">
                                Year
                            </div>
                            <div class="pl-4">{{ pp.year }}</div>
                        </div>

                        <div class="bg-blue-100 p-2 rounded mt-3">
                            <div class="italic font-bold text-sm">
                                Preparation Timeframe
                            </div>
                            <div class="pl-4">{{ pp.prep_start }} to {{ pp.prep_end }}</div>
                        </div>

                        <div class="bg-blue-100 p-2 rounded mt-3">
                            <div class="italic font-bold text-sm">
                                Remarks
                            </div>
                            <div class="pl-4">{{ pp.remarks }}</div>
                        </div>

                        <div class="bg-blue-100 p-2 rounded mt-3">
                            <div class="pl-4">
                                <span v-if="pp.active">This procurement plan is currently ACTIVE</span>
                                <span v-if="!pp.active">This procurement plan is currently INACTIVE</span>
                            </div>
                        </div>

                        <div class="mt-4">
                            <Link :href="'/procurement-plans/' + pp.id + '/edit'" class="button2">
                                <i class="fa fa-edit"></i> Edit Procurement Plan
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
