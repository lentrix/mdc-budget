<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    category: Object
})

const form = useForm({
    category_name: props.category.category_name,
    category_description: props.category.category_description,
    type: props.category.type
})

function submit() {
    form.patch('/categories/' + props.category.id)
}
</script>

<template>
    <Head title="Update Category" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Update Category</h2>
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
                                <i class="fa fa-save"></i> Update Category
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
