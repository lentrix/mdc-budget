<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';
    import Price from '@/Components/Price.vue';

    const props = defineProps({
        category: Object,
        budgetItems: Array
    })
</script>

<template>
    <Head :title="'Category: ' + category.category_name" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Category: {{ category.category_name }}</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8 sm:flex justify-between">
                <div class="flex-1 px-6">
                    <div class="bg-white rounded shadow p-6">
                        <h4 class="text-xl">Departmental Appropriations</h4>
                        <hr>
                        <table class="table mt-6">
                            <thead>
                                <tr>
                                    <th>Department</th>
                                    <th>Item</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="bi in budgetItems" :key="bi.id">
                                    <td>{{ bi.department }}</td>
                                    <td>{{ bi.item }}</td>
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
                <div style="min-width: 300px!important;">
                    <div class="bg-white rounded shadow p-6">
                        <h4 class="text-xl">Category Details</h4>
                        <hr>
                        <div class="bg-blue-100 p-2 rounded">
                            <div class="italic font-bold text-sm">
                                Category Name
                            </div>
                            <div class="pl-4">{{ category.category_name }}</div>
                        </div>

                        <div class="bg-blue-100 p-2 rounded mt-4">
                            <div class="italic font-bold text-sm">
                                Description
                            </div>
                            <div class="pl-4">{{ category.category_description }}</div>
                        </div>

                        <div class="bg-blue-100 p-2 rounded mt-4">
                            <div class="italic font-bold text-sm">
                                Type
                            </div>
                            <div class="pl-4 uppercase">{{ category.type }}</div>
                        </div>
                        <div class="mt-4">
                            <Link :href="'/categories/' + category.id + '/edit'" class="button2">
                                <i class="fa fa-edit"></i> Edit Category
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
