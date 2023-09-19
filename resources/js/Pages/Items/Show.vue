<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Price from '@/Components/Price.vue'

const props = defineProps({
    item: Object,
    budgetItems: Array
})
</script>

<template>
    <Head :title="'View Item: ' + item?.item_name" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">View Item: {{item?.item_name}}</h2>
        </template>

        <template #subnav>
            <Link href="/items" class="button1">
                <i class="fa-solid fa-backward"></i> Back
            </Link>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8 sm:flex justify-between">
                <div class="flex-1 px-6">
                    <div class="bg-white rounded shadow p-6">
                        <h4 class="text-xl">Departmental Appropriations</h4>
                        <hr>
                        <table class="table mt-6 shadow">
                            <thead>
                                <tr>
                                    <th>Department</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="bi in budgetItems" :key="bi.id">
                                    <td>{{ bi.department }}</td>
                                    <td class="text-center">{{ bi.qty }}</td>
                                    <td class="text-right">
                                        <Price :regularPrice="bi.regularPrice" :customPrice="bi.price" :remarks="bi.remarks"  />
                                    </td>
                                    <td class="text-right">{{ bi.amount.toLocaleString() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="min-width: 400px!important;">
                    <div class="bg-white rounded shadow p-6">
                        <h4 class="text-xl">Item Details</h4>
                        <hr>
                        <div class="bg-blue-100 p-2 rounded">
                            <div class="italic font-bold text-sm">
                                Item Name
                            </div>
                            <div class="pl-4">{{ item.item_name }}</div>
                        </div>

                        <div class="bg-blue-100 p-2 rounded mt-4">
                            <div class="italic font-bold text-sm">
                                Description
                            </div>
                            <div class="pl-4">{{ item.item_description }}</div>
                        </div>

                        <div class="bg-blue-100 p-2 rounded mt-4">
                            <div class="italic font-bold text-sm">
                                Category
                            </div>
                            <div class="pl-4 uppercase">{{ item.categoryName }}</div>
                        </div>

                        <div class="bg-blue-100 p-2 rounded mt-4">
                            <div class="italic font-bold text-sm">
                                Regular Price
                            </div>
                            <div class="pl-4 uppercase">{{ item.formattedRegularPrice }}</div>
                        </div>
                        <div class="mt-4">
                            <Link :href="'/items/' + item.id + '/edit'" class="button2">
                                <i class="fa fa-edit"></i> Edit Item
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
