<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'

var props = defineProps({
    users: Array
})

</script>

<template>
    <Head title="User Management" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">User Management</h2>
        </template>
        <template #subnav>
            <Link href="/users/create" class="button1">
                <i class="fa fa-plus"></i> Create User
            </Link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <table>
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>User Name</th>
                                    <th>Full Name</th>
                                    <th class="text-center">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id">
                                    <td>{{ ('0000000' + user.id).slice(-7) }}</td>
                                    <td>{{ user.user_name }}</td>
                                    <td>{{ user.full_name }}</td>
                                    <td class="text-center max-w-[24px]">
                                        <Link :href="'/users/edit/' + user.id">
                                            <i class="fa-solid fa-user-pen"></i>
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
