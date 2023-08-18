<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    user_id: '',
    threshold: ''
})

const props = defineProps({
    users: Array
})
</script>

<template>
    <Head title="Create Department" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Create Department</h2>
        </template>

        <div class="py-12">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label for="name">Department Name</label>
                                <input type="text" id="name" v-model="form.name">
                                <span class="input-error"></span>
                            </div>
                            <div class="form-group">
                                <label for="threshold">Budget Threshold</label>
                                <input type="number" id="threshold" v-model="form.threshold">
                                <span class="input-error"></span>
                            </div>
                            <div class="form-group">
                                <label for="user_id">Assigned User</label>
                                <select id="user_id" v-model="form.user_id">
                                    <option value="">Select user</option>
                                    <option v-for="user in users" :value="user.id">{{ user.full_name }}</option>
                                </select>
                                <span class="input-error"></span>
                            </div>
                            <button class="mt-3 button2" type="submit">
                                <i class="fa fa-save"></i> Create Department
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
