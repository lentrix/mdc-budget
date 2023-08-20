<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    categories: Array,
    item: Object
})

const form = useForm({
    item_name: props.item.item_name,
    item_description: props.item.item_description,
    unit: props.item.unit,
    regular_price: props.item.regular_price,
    category_id: props.item.category_id
})

function submit() {
    form.patch('/items/' + props.item.id)
}
</script>

<template>
    <Head title="Edit Item" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Edit Item</h2>
        </template>

        <div class="py-12">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label for="item_name">Item Name</label>
                                <input type="text" id="item_name" v-model="form.item_name">
                                <div class="error-label" v-if="form.errors.item_name">{{ form.errors.item_name }}</div>
                            </div>

                            <div class="form-group">
                                <label for="item_description">Item Description</label>
                                <input type="text" id="item_description" v-model="form.item_description" >
                                <div class="error-label" v-if="form.errors.item_description">{{ form.errors.item_description }}</div>
                            </div>

                            <div class="form-group">
                                <label for="unit">Unit of Measurement</label>
                                <input type="text" id="unit" v-model="form.unit">
                                <div class="error-label" v-if="form.errors.unit">{{ form.errors.unit }}</div>
                            </div>

                            <div class="form-group">
                                <label for="regular_price">Regular Price</label>
                                <input type="text" id="regular_price" v-model="form.regular_price">
                                <div class="error-label" v-if="form.errors.regular_price">{{ form.errors.regular_price }}</div>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select id="category_id" v-model="form.category_id">
                                    <option value="0">Select category</option>
                                    <option v-for="category in categories" :key="category.id" :value="category.id">
                                        {{ category.category_name }}
                                    </option>
                                </select>
                                <div class="error-label" v-if="form.errors.category_id">{{ form.errors.category_id }}</div>
                            </div>

                            <button class="button2 mt-3" type="submit">
                                <i class="fa fa-save"></i> Save Changes
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
