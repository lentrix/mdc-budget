<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    year: null,
    prep_start: '',
    prep_end: '',
    remarks: ''
})

function submit() {
    form.post('/procurement-plans')
}
</script>

<template>
    <Head title="Create Procurement Plan" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Create Procurement Plan</h2>
        </template>

        <div class="py-12">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" v-model="form.title">
                                <div class="error-label" v-if="form.errors.title">{{ form.errors.title }}</div>
                            </div>

                            <div class="form-group">
                                <label for="year">Year</label>
                                <input type="number" id="year" v-model="form.year" min="2023">
                                <div class="error-label" v-if="form.errors.year">{{ form.errors.year }}</div>
                            </div>

                            <h5 class="text-xl mt-3">Preparation Timeframe</h5>
                            <div class="form-group">
                                <label for="prep_start">From</label>
                                <input type="date" id="prep_start" v-model="form.prep_start">
                                <div class="error-label" v-if="form.errors.prep_start">{{ form.errors.prep_start }}</div>
                            </div>
                            <div class="form-group">
                                <label for="prep_end">To</label>
                                <input type="date" id="prep_end" v-model="form.prep_end">
                                <div class="error-label" v-if="form.errors.prep_end">{{ form.errors.prep_end }}</div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="remarks">Remarks</label>
                                <input type="text" id="remarks" v-model="form.remarks">
                                <div class="error-label" v-if="form.errors.remarks">{{ form.errors.remarks }}</div>
                            </div>

                            <button class="button2 mt-3" type="submit">Create Procurement Plan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
