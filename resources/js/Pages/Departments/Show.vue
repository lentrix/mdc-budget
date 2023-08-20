<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    dept: Object
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Projected Amount</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div style="min-width: 400px!important;">
                    <div class="bg-white rounded shadow p-6">
                        <h4 class="text-xl">Department Details</h4>
                        <hr>
                        <div class="p-2 bg-blue-100 mt-3 rounded">
                            <div class="font-bold text-sm italic">Department/Office</div>
                            {{ dept.name }}
                        </div>
                        <div class="p-2 bg-blue-100 mt-3 rounded">
                            <div class="font-bold text-sm italic">Personel In-charge</div>
                            {{ dept.user.full_name }}
                        </div>
                        <div class="p-2 bg-blue-100 mt-3 rounded">
                            <div class="font-bold text-sm italic">Budgetary Threshold</div>
                            {{ dept.formattedThreshold }}
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
