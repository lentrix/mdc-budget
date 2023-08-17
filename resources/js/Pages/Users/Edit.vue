<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    user: {
        full_name: null,
        user_name: null
    }
})

const form = useForm({
    full_name: "",
    user_name: "",
    password: ""
})
</script>

<template>
    <Head title="Edit User" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Edit User</h2>
        </template>

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p>Full Name: {{ user.full_name }}</p>
                        <form action="#" @submit.prevent="submit">
                            <div class="form-group">
                                <label for="user_name">User Name</label>
                                <input type="text" id="user_name" v-model="form.user_name">
                                <div class="error-label" v-if="form.user_name.error">{{ form.user_name.error }}</div>
                            </div>
                            <div class="form-group">
                                <label for="user_name">Full Name</label>
                                <input type="text" id="user_name" v-model="form.full_name">
                                <div class="error-label" v-if="form.user_name.error">{{ form.user_name.error }}</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
