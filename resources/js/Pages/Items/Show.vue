<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    item: Object
})
</script>

<template>
    <Head :title="'View Item: ' + item?.item_name" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">View Item: {{item?.item_name}}</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8 sm:flex justify-between">
                <div class="flex-1 px-6">
                    <div class="bg-white rounded shadow p-6">
                        <h4 class="text-xl">Departmental Appropriations</h4>
                        <hr>
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
