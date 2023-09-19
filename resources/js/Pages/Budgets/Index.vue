<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';

    const props = defineProps({
        budgets: Array,
        summaries: Object,
        total: Number
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
                <div class="p-6 bg-white shadow rounded-lg" v-for="(budget, index) in budgets" :key="budget.id">
                    <div class="flex justify-between">
                        <h4 class="text-2xl">{{ budget.department.name }}</h4>
                        <Link :href="'/budgets/' + budget.id + '/manage'" class="button2">
                            <i class="fa fa-folder-open"></i> Manage Budget
                        </Link>
                    </div>
                    <hr class="mt-2">

                    <h4 class="text-xl font-bold">
                        I. Operational Expenses
                    </h4>
                    <div class="pl-8">
                        <table class="w-full">
                            <tr v-for="item in summaries[index].opex.summary">
                                <td>{{ item.category_name }}</td>
                                <td class="text-right">{{ item.amount.toLocaleString() }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">TOTAL</td>
                                <td class="text-right">{{ summaries[index].opex.total.toLocaleString() }}</td>
                            </tr>
                        </table>
                    </div>

                    <h4 class="text-xl font-bold">
                        II. Capital Expenditures
                    </h4>
                    <div class="pl-8">
                        <table class="w-full">
                            <tr v-for="item in summaries[index].capex.summary">
                                <td>{{ item.category_name }}</td>
                                <td class="text-right">{{ item.amount.toLocaleString() }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">TOTAL</td>
                                <td class="text-right">{{ summaries[index].capex.total.toLocaleString() }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="pl-8 pt-6">
                        <table class="w-full">
                            <tr>
                                <td class="font-bold">TOTAL APPROPRIATIONS</td>
                                <td class="text-right font-bold">{{ total.toLocaleString() }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
