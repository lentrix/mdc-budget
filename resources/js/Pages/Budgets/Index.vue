<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';

    const props = defineProps({
        budgets: Array,
    })
</script>

<template>
    <Head title="Budget" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Budget</h2>
        </template>

        <div class="py-12">
            <div class="sm:px-6 lg:px-8 grid grid-cols-2 gap-6">
                <div class="p-6 bg-white shadow rounded-lg" v-for="budget in budgets" :key="budget.id">
                    <div class="flex justify-between">
                        <h4 class="text-2xl">{{ budget.department.name }}</h4>
                        <Link :href="'/budgets/' + budget.id + '/manage'" class="button2">
                            <i class="fa fa-folder-open"></i> Manage Budget
                        </Link>
                    </div>
                    <hr class="mt-2">

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
