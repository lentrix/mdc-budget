<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Price from '@/Components/Price.vue'

const props = defineProps({
    dept: Object,
    opex: Object,
    capex: Object,
    opexTotal: Number,
    capexTotal: Number,
    total: Number,
    remarks: String,
    budget: Object,
    canReview: Boolean
})

</script>

<template>
    <Head :title="dept.name" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">{{ dept.name }}</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8 sm:flex justify-between">
                <div class="flex-1 px-6">
                    <div class="bg-white rounded shadow p-6">
                        <h4 class="text-xl">Budgetary Details</h4>

                        <table class="table mt-3 shadow-lg">
                            <thead>
                                <tr><td colspan="4" class="bg-gray-900 text-gray-100">Operating Expenses</td></tr>
                                <tr>
                                    <th class="w-[70%]">Description</th>
                                    <th class="w-[11%] text-right">Price</th>
                                    <th class="w-[8%] text-center">Qty</th>
                                    <th class="w-[11%] text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in opex" :key="item.id">
                                    <td>{{ item.description }}</td>
                                    <td class="text-right">
                                        <Price :regularPrice="item.regularPrice" :customPrice="item.price" :remarks="item.remarks"  />
                                    </td>
                                    <td class="text-center">{{ item.qty.toLocaleString() }}</td>
                                    <td class="text-right">{{ (item.price*item.qty).toLocaleString() }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-left">TOTAL OPEX</th>
                                    <th class="text-right font-bold">
                                        {{ opexTotal ? opexTotal.toLocaleString() : '' }}
                                    </th>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table mt-6 shadow-lg">
                            <thead>
                                <tr><td colspan="4" class="bg-gray-900 text-gray-100">Capital Expenditures</td></tr>
                                <tr>
                                    <th class="w-[70%]">Description</th>
                                    <th class="w-[11%] text-right">Price</th>
                                    <th class="w-[8%] text-center">Qty</th>
                                    <th class="w-[11%] text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in capex" :key="item.id">
                                    <td>{{ item.description }}</td>
                                    <td class="text-right">
                                        <Price :regularPrice="item.regularPrice" :customPrice="item.price" :remarks="item.remarks"  />
                                    </td>
                                    <td class="text-center">{{ item.qty.toLocaleString() }}</td>
                                    <td class="text-right">{{ (item.price*item.qty).toLocaleString() }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-left">TOTAL CAPEX</th>
                                    <th class="text-right font-bold">
                                        {{ capexTotal ? capexTotal.toLocaleString() : '' }}
                                    </th>
                                </tr>
                            </tbody>
                        </table>

                        <div class="bg-gray-900 p-2 mt-6 text-gray-100 flex">
                            <div class="flex-1 font-bold">
                                TOTAL APPROPRIATIONS
                            </div>
                            <div class="font-bold">
                                {{ total.toLocaleString() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div style="min-width: 300px!important;">
                    <div class="bg-white rounded shadow p-6">
                        <h4 class="text-xl">Department Details</h4>
                        <hr>
                        <div class="p-2 bg-blue-100 mt-3 rounded">
                            <div class="font-bold text-sm italic">Department/Office</div>
                            <span class="pl-4">{{ dept.name }}</span>
                        </div>
                        <div class="p-2 bg-blue-100 mt-3 rounded">
                            <div class="font-bold text-sm italic">Personel In-charge</div>
                            <span class="pl-4">{{ dept.user.full_name }}</span>
                        </div>
                        <div class="p-2 bg-blue-100 mt-3 rounded">
                            <div class="font-bold text-sm italic">Budgetary Threshold</div>
                            <span class="pl-4">{{ dept.formattedThreshold }}</span>
                        </div>

                        <div class="mt-6">
                            <Link class="button2" :href="'/departments/edit/' + dept.id">
                                <i class="fa fa-edit"></i> Edit Department
                            </Link>
                        </div>
                    </div>

                    <div class="bg-white rounded shadow p-6 mt-6">
                        <h4 class="text-xl">Budget Status</h4>

                        <div class="flex flex-col" v-if="budget?.status=='pending'">
                            <div class="text-orange-700 font-bold text-xl border border-orange-700 mt-3 text-center p-2 rounded">Pending</div>
                            <Link :href="'/budgets/' + budget.id + '/approve'"
                                v-if="canReview"
                                method="post" as="button"
                                class="text-center mt-6 bg-green-600 p-2 rounded text-white hover:bg-green-500 duration-300">Approve Budget</Link>
                        </div>

                        <div class="flex flex-col" v-if="budget?.status=='approved'">
                            <div class="text-green-700 text-xl border border-green-700 mt-3 text-center p-2 rounded">
                                <div class="font-bold ">Approved</div>
                                <div class="text-sm">by {{ budget.approved_by.user_name }} on {{ budget.approved_at }}</div>
                            </div>
                            <Link :href="'/budgets/' + budget.id + '/retract-approval'"
                                v-if="canReview"
                                method="post" as="button"
                                class="text-center mt-6 bg-orange-600 p-2 rounded text-white hover:bg-orange-500 duration-300">Retract Approval</Link>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
