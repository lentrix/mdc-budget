<template>
    <h4 class="text-xl">{{ title }}</h4>
    <table class="table" v-if="requests.length>0">
        <tr>
            <th>Item</th>
            <th>Description</th>
            <th>Category</th>
            <th>Price</th>
        </tr>
        <tr v-for="p in requests" :key="p.id">
            <td>{{ p.item_name }}</td>
            <td>{{ p.item_description }}</td>
            <td>{{ p.category.category_name }}</td>
            <td class="text-right">{{ p.regular_price.toLocaleString() }}</td>
        </tr>
    </table>
    <div v-else>Nothing to show</div>
    <br>
</template>

<script setup>

const props = defineProps({
    title: String,
    requests: Array
})
</script>
