<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    full_name: "",
    user_name: "",
    password: ""
})

const submit = () =>{
    form.post('/users')
}
</script>

<template>
    <Head title="Create User" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Create User</h2>
        </template>

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form action="#" @submit.prevent="submit">
                            <div class="form-group">
                                <label for="user_name">User Name</label>
                                <input type="text" id="user_name" v-model="form.user_name">
                                <div class="error-label" v-if="form.errors.user_name">{{ form.errors.user_name }}</div>
                            </div>
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" id="full_name" v-model="form.full_name">
                                <div class="error-label" v-if="form.errors.full_name">{{ form.errors.full_name }}</div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" v-model="form.password">
                                <div class="error-label" v-if="form.password.error">{{ form.password.error }}</div>
                            </div>
                            <div class="mt-4">
                                <button class="button2" type="submit">
                                    <i class="fa fa-save"></i> Create User
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
