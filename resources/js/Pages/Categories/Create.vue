<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    category_name: '',
    category_description: '',
    type: ''
})

function submit() {
    form.post('/categories')
}
</script>

<template>
    <Head title="Create Category" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Create Category</h2>
        </template>

        <div class="py-12">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" id="category_name" v-model="form.category_name">
                                <div class="error-label" v-if="form.errors.category_name">{{ form.errors.category_name }}</div>
                            </div>
                            <div class="form-group">
                                <label for="category_description">Description</label>
                                <input type="text" id="category_description" v-model="form.category_description">
                                <div class="error-label" v-if="form.errors.category_description">{{ form.errors.category_description }}</div>
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select id="type" v-model="form.type">
                                    <option value="">Select type</option>
                                    <option value="opex">Operating Expenses</option>
                                    <option value="capex">Capital Expenditures</option>
                                </select>
                                <div class="error-label" v-if="form.errors.type">{{ form.errors.type }}</div>
                            </div>

                            <button class="mt-3 button2" type="submit">
                                <i class="fa fa-save"></i> Create Category
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
