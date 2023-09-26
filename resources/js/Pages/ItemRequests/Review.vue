<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    items: Array
})
</script>

<template>
    <Head title="Review Item Requests" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Review Item Requests</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-4 rounded shadow">
                    <table class="table">
                        <tr>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Unit Measurement</th>
                            <th>Category</th>
                            <th class="text-right">Price</th>
                            <th>Requested by</th>
                            <th>...</th>
                        </tr>
                        <tr v-for="i in items" :key="i.id">
                            <td>{{ i.item_name }}</td>
                            <td>{{ i.item_description }}</td>
                            <td>{{ i.unit }}</td>
                            <td>{{ i.category.category_name }}</td>
                            <td class="text-right">{{ i.regular_price.toLocaleString() }}</td>
                            <td>{{ i.requested_by?.full_name }}</td>
                            <td>
                                <div class="flex gap-2 justify-center">
                                    <Link :href="'/item-request/' + i.id + '/reject'"
                                            method="patch" as="button"
                                            class="bg-red-600 text-white px-2 rounded" title="Reject this item request">
                                        <i class="fa fa-times"></i>
                                    </Link>
                                    <Link :href="'/item-request/' + i.id + '/accept'"
                                            method="patch" as="button"
                                            class="bg-green-600 text-white px-2 py rounded-full" title="Accept this item request">
                                        <i class="fa fa-check"></i>
                                    </Link>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
