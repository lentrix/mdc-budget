<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    dept: Object,
    opex: Object,
    capex: Object,
    opexTotal: Number,
    capexTotal: Number,
    total: Number
})

</script>

<template>
    <Head :title="dept.name" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">{{ dept.name }}</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8 sm:flex justify-between">
                <div class="flex-1 px-6">
                    <div class="bg-white rounded shadow p-6">
                        <h4 class="text-xl">Budgetary Details</h4>

                        <table class="table mt-3 shadow-lg">
                            <thead>
                                <tr><td colspan="4" class="bg-gray-900 text-gray-100">Operating Expenses</td></tr>
                                <tr>
                                    <th>Description</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-right">Projected Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in opex" :key="item.id">
                                    <td>{{ item.description }}</td>
                                    <td class="text-right">{{ item.price.toLocaleString() }}</td>
                                    <td class="text-center">{{ item.qty.toLocaleString() }}</td>
                                    <td class="text-right">{{ (item.price*item.qty).toLocaleString() }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-left">TOTAL OPEX</th>
                                    <th class="text-right font-bold">
                                        {{ opexTotal.toLocaleString() }}
                                    </th>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table mt-6 shadow-lg">
                            <thead>
                                <tr><td colspan="4" class="bg-gray-900 text-gray-100">Capital Expenditures</td></tr>
                                <tr>
                                    <th>Description</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-right">Projected Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in capex" :key="item.id">
                                    <td>{{ item.description }}</td>
                                    <td class="text-right">{{ item.price.toLocaleString() }}</td>
                                    <td class="text-center">{{ item.qty.toLocaleString() }}</td>
                                    <td class="text-right">{{ (item.price*item.qty).toLocaleString() }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-left">TOTAL CAPEX</th>
                                    <th class="text-right font-bold">
                                        {{ capexTotal.toLocaleString() }}
                                    </th>
                                </tr>
                            </tbody>
                        </table>

                        <div class="bg-gray-900 p-2 mt-6 text-gray-100 flex">
                            <div class="flex-1 font-bold">
                                TOTAL APPROPRIATIONS
                            </div>
                            <div class="font-bold">
                                {{ total.toLocaleString() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div style="min-width: 300px!important;">
                    <div class="bg-white rounded shadow p-6">
                        <h4 class="text-xl">Department Details</h4>
                        <hr>
                        <div class="p-2 bg-blue-100 mt-3 rounded">
                            <div class="font-bold text-sm italic">Department/Office</div>
                            <span class="pl-4">{{ dept.name }}</span>
                        </div>
                        <div class="p-2 bg-blue-100 mt-3 rounded">
                            <div class="font-bold text-sm italic">Personel In-charge</div>
                            <span class="pl-4">{{ dept.user.full_name }}</span>
                        </div>
                        <div class="p-2 bg-blue-100 mt-3 rounded">
                            <div class="font-bold text-sm italic">Budgetary Threshold</div>
                            <span class="pl-4">{{ dept.formattedThreshold }}</span>
                        </div>

                        <div class="mt-6">
                            <Link class="button2" :href="'/departments/edit/' + dept.id">
                                <i class="fa fa-edit"></i> Edit Department
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
