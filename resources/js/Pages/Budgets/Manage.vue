<script setup>
    import Modal from '@/Components/Modal.vue';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import { ref } from 'vue'


    const props = defineProps({
        budget: Object,
        capex: Array,
        opex: Array,
        opexTotal: null,
        capexTotal: null,
        total: null
    })

    const form = useForm({
        item_id: null,
        qty: 1,
        budget_id: props.budget.id,
        price: null,
        remarks: ''
    })

    const deleteForm = useForm({
        budget_item_id: null
    })

    let totalAppropriations = 123456

    let searchName = ref('')
    let description = ref('')

    let showModal = ref(false)
    let showSearchResult = ref(false)
    let searchData = ref(Array)
    let deleteItem = ref({
        name: '',
        description: '',
        id: null
    })

    function searchItem() {
        if(searchName.value.length >= 3) {
            axios.post('/api/items/search',{"name":searchName.value})
                .then(data=>{
                    showSearchResult.value=true
                    searchData.value = data.data
                })
        }else {
            showSearchResult.value=false
        }
    }

    function addItem(item) {
        showSearchResult.value = false
        searchData.value = []
        form.item_id = item.id
        searchName.value = item.item_name
        description.value = item.item_description
        form.price = item.regular_price
    }

    function submitItem() {
        if(form.price!=searchData.price && (form.remarks=='' || form.remarks==null)) {
            alert('You have to provide a reason for changing the price in the remarks field.')
            return
        }
        form.post('/budgets/' + props.budget.id + "/add-item",{
            onSuccess: () => {
                searchName.value = null
                description.value = null
                form.price = null
                form.qty = 1
                form.remarks = null
                form.item_id = null
            }
        })
    }

    function clearSearch() {
        form.item_id = null
        searchName.value = null
        description.value = null
        form.price = null
        form.qty = 1
        form.remarks = null
        showSearchResult.value = false
    }

    function attemptDelete(item) {
        console.log(item)
        showModal.value = true;
        deleteItem.value = item;
        deleteForm.budget_item_id = item.id
    }

    function deleteBudgetItem() {
        deleteForm.delete('/budgets/delete-item',{
            onSuccess: () => {
                showModal.value = false
            }
        })
    }

</script>

<template>
    <Head title="Manage Budget" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">Manage Budget</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8 sm:flex sm:justify-between">
                <div style="width: 270px!important" class="pr-4">
                    <div class="p-6 text-gray-900 bg-white shadow rounded-lg">
                        <h4 class="text-2xl">Item Entry</h4>
                        <hr>
                        <form @submit.prevent="submitItem">
                            <input type="hidden" v-model="form.item_id">
                            <div class="form-group mt-3" style="position:relative">
                                <label for="name">Item Name</label>
                                <input type="text" id="name" autocomplete="off" v-model="searchName" @keyup="searchItem">
                                <div class="error-label" v-if="form.errors.item_id">{{ form.errors.item_id }}</div>
                                <div v-if="showSearchResult" class="border boder-gray-300 rounded p-4 bg-gray-100 w-[700px] shadow-lg"
                                        style="position: absolute; top: 68px; left: 0px; z-index: 100; overflow: scroll; max-height: 400px;">
                                    <div class="flex justify-between">
                                        <h5 class="font-bold text-xl">Search Results</h5>
                                        <button class="py-1 px-2 mb-2 bg-gray-200 rounded" @click="clearSearch">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Item Name</th>
                                                <th>Description</th>
                                                <th class="text-center">...</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in searchData" :key="item.id">
                                                <td>{{ item.item_name }}</td>
                                                <td>{{ item.item_description }}</td>
                                                <td>
                                                    <button @click="addItem(item)">
                                                        <i class="fa-solid fa-check-to-slot"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="3" class="w-full border border-gray-300 rounded" v-model="description" readonly></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" step="0.50" :readonly="form.remarks==''" v-model="form.price">
                                <div class="error-label" v-if="form.errors.price">{{ form.errors.price }}</div>
                            </div>
                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="number" v-model="form.qty">
                                <div class="error-label" v-if="form.errors.qty">{{ form.errors.qty }}</div>
                            </div>
                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <textarea name="remarks" id="remarks" rows="3" class="w-full border border-gray-300 rounded" v-model="form.remarks"></textarea>
                            </div>
                            <button class="button2" type="submit">
                                <i class="fa fa-plus"></i> Add Item
                            </button>
                        </form>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex-1">
                    <div class="p-6 text-gray-900">
                        <h4 class="text-2xl mb-4">{{ budget.department.name }}</h4>

                        <table class="table mb-6">
                            <thead>
                                <tr>
                                    <th class="bg-gray-800 text-white" colspan="7">Operational Expenses</th>
                                </tr>
                                <tr>
                                    <th class="w-[20%]">Item</th>
                                    <th>Description</th>
                                    <th class="w-[15%]">Category</th>
                                    <th class="w-[5%] text-center">Qty</th>
                                    <th class="w-[12%]">Price</th>
                                    <th class="w-[12%]">Total</th>
                                    <th class="text-center">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in opex" :key="item.id">
                                    <td class="flex">
                                        <div class="flex-1">{{ item.item.item_name }}</div>
                                        <i class="fa cursor-pointer fa-info text-sm flex justify-center items-center text-center p-1 bg-blue-500 w-[20px] h-[20px] rounded-full" style="position: right: 0px"
                                            v-if="item.remarks" :title="item.remarks"></i>
                                    </td>
                                    <td>{{ item.item.item_description }}</td>
                                    <td>{{ item.item.category.category_name }}</td>
                                    <td class="text-center">{{ item.qty }}</td>
                                    <td class="text-right">{{ item.formattedCustomPrice }}</td>
                                    <td class="text-right">{{ item.formattedTotal }}</td>
                                    <td class="text-center">
                                        <button class="text-red-700" @click="attemptDelete(item)">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="font-bold">TOTAL</td>
                                    <td class="text-right font-bold">{{ opexTotal }}</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table mb-6">
                            <thead>
                                <tr>
                                    <th class="bg-gray-800 text-white" colspan="7">Capital Expenditures</th>
                                </tr>
                                <tr>
                                    <th class="w-[20%]">Item</th>
                                    <th>Description</th>
                                    <th class="w-[15%]">Category</th>
                                    <th class="w-[5%] text-center">Qty</th>
                                    <th class="w-[12%]">Price</th>
                                    <th class="w-[12%]">Total</th>
                                    <th class="text-center">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in capex" :key="item.id">
                                    <td>{{ item.item.item_name }}</td>
                                    <td>{{ item.item.item_description }}</td>
                                    <td>{{ item.item.category.category_name }}</td>
                                    <td class="text-center">{{ item.qty }}</td>
                                    <td class="text-right">{{ item.formattedCustomPrice }}</td>
                                    <td class="text-right">{{ item.formattedTotal }}</td>
                                    <td class="text-center">
                                        <button class="text-red-700" @click="attemptDelete(item)">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="font-bold">TOTAL</td>
                                    <td class="text-right font-bold">{{ capexTotal }}</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>

                        <hr class="py-2">

                        <div class="flex justify-between">
                            <div class="text-xl font-bold">Departmental Threshold: {{ budget.department.formattedThreshold }}</div>
                            <div class="text-xl font-bold">Total Current Appropriations: {{ total }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Modal :show="showModal">
            <div class="p-6">
                <div>Are you sure you want to delete this item?</div>
                <div class="p-2 rounded my-3 bg-yellow-200 border border-yellow-500">
                    {{ deleteItem.item.item_name }} - {{deleteItem.item.item_description}}
                </div>
                <div class="flex justify-center">
                    <button class="p-2 bg-green-100 border border-green-700 text-green-700 mx-4 hover:bg-green-700 hover:text-green-100 duration-300"
                            @click="showModal=false">
                        <i class="fa fa-ban"></i> Cancel
                    </button>
                    <button class="p-2 rounded border border-red-500 bg-red-100 text-red-700 hover:bg-red-700 hover:text-red-100 duration-300"
                            @click="deleteBudgetItem">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </div>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>
