<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';

    const props = defineProps({
        items: Array,
        canManageItems: Boolean
    })

</script>

<template>
    <Head title="Items" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Items</h2>
        </template>
        <template #subnav>
            <Link href="/items/create" class="button1" v-if="canManageItems">
                <i class="fa fa-plus"></i> Create Item
            </Link>
            <Link href="/item-requests" class="button1" v-else>
                <i class="fa-solid fa-upload"></i> Request Item Entry
            </Link>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 w-full">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Description</th>
                                    <th>Unit</th>
                                    <th>Category</th>
                                    <th class="text-right">Regular Price</th>
                                    <th class="text-center" v-if="canManageItems">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in items" :key="item.id">
                                    <td>{{ item.item_name }}</td>
                                    <td>{{ item.item_description }}</td>
                                    <td>{{ item.unit }}</td>
                                    <td>{{ item.categoryName }}</td>
                                    <td class="text-right">{{ item.formattedRegularPrice }}</td>
                                    <td class="text-center" v-if="canManageItems">
                                        <Link :href="'/items/' + item.id">
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
