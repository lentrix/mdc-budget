<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';

    const props = defineProps({
        budget: Object
    })

    let totalAppropriations = 123456
</script>

<template>
    <Head title="Manage Budget" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Manage Budget</h2>
        </template>
        <template #subnav>
            <Link href="/departments/create" class="button1">
                <i class="fa fa-plus"></i> Add Item
            </Link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h4 class="text-2xl mb-4">{{ budget.department.name }}</h4>

                        <table class="table mb-6">
                            <thead>
                                <tr>
                                    <th class="bg-gray-800 text-white" colspan="5">Operational Expenses</th>
                                </tr>
                                <tr>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                        </table>

                        <table class="table mb-6">
                            <thead>
                                <tr>
                                    <th class="bg-gray-800 text-white" colspan="5">Capital Expenditures</th>
                                </tr>
                                <tr>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                        </table>

                        <hr class="py-2">

                        <div class="flex justify-between">
                            <div class="text-xl font-bold">Departmental Threshold: {{ budget.department.threshold }}</div>
                            <div class="text-xl font-bold">Total Current Appropriations: {{ totalAppropriations }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
