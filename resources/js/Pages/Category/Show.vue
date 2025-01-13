<script setup>

import EcommerceLayout from "@/Layouts/EcommerceLayout.vue";
import Card from "@/Components/App/Product/Card.vue";

const props = defineProps({
    category: Object,
    products: Array,
});

</script>

<template>
    <ecommerce-layout>
        <h1>{{ category.name }}</h1>
        <div class="grid grid-cols-3 gap-4">
            <card v-for="product in products.data" :key="product.id" :product="product" />
        </div>
    </ecommerce-layout>
</template>

<style scoped>

</style>
