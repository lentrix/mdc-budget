<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';

    const props = defineProps({
        opex: Array,
        capex: Array
    })
</script>

<template>
    <Head title="Categories" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Categories</h2>
        </template>
        <template #subnav>
            <Link href="/categories/create" class="button1">
                <i class="fa fa-plus"></i> Create Category
            </Link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 lg:flex lg:items-stretched lg:justify between">
                <div class="flex-1 px-4">
                    <div class="bg-white text-gray-900 rounded p-4 shadow">
                        <h3 class="text-xl">Operating Expenses</h3>
                        <hr>
                        <table class="table mt-2">
                            <thead>
                                <tr>
                                    <th class="w-[60%]">Category</th>
                                    <th>Appropriations</th>
                                    <th class="text-center">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="itm in opex" :key="itm.id">
                                    <td>{{ itm.category_name }}</td>
                                    <td class="text-right">{{itm.formattedTotal}}</td>
                                    <td class="text-center">
                                        <Link :href="'/categories/' + itm.id">
                                            <i class="fa fa-folder-open"></i>
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex-1 px-4">
                    <div class="bg-white text-gray-900 rounded p-4 shadow">
                        <h3 class="text-xl">Capital Expenditures</h3>
                        <hr>
                        <table class="table mt-2">
                            <thead>
                                <tr>
                                    <th class="w-[60%]">Category</th>
                                    <th>Appropriations</th>
                                    <th class="text-center">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="itm in capex" :key="itm.id">
                                    <td>{{ itm.category_name }}</td>
                                    <td class="text-right">{{itm.formattedTotal}}</td>
                                    <td class="text-center">
                                        <Link :href="'/categories/' + itm.id">
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
