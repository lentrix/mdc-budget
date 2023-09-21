<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ItemRequestTable from '@/Components/ItemRequestTable.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    categories: Array,
    pending: Array,
    accepted: Array,
    rejected: Array
})

const form = useForm({
    item_name: '',
    item_description: '',
    unit: '',
    regular_price: null,
    category_id: 0
})

function submit() {
    form.post('/item-requests', {
        onSuccess: () =>{
            clearForm()
        }
    })
}

function clearForm() {
    console.log('Clear form...')
    form.item_name = ''
    form.item_description = ''
    form.unit = ''
    form.regular_price = null
    form.category_id = 0
}
</script>

<template>
    <Head title="Item Requests" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Item Requests</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8 flex gap-6">
                <div class="bg-white p-6 rounded shadow-sm w-[400px]">
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
                            <i class="fa-solid fa-upload"></i> Request Item Entry
                        </button>
                    </form>
                </div>
                <div class="bg-white p-6 flex-1 rounded shadow-sm">
                    <ItemRequestTable title="Pending Requests" :requests="pending" />

                    <ItemRequestTable title="Accepted Requests" :requests="accepted" />

                    <ItemRequestTable title="Rejected Requests" :requests="rejected" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
