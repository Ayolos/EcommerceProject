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
        <div>Categorie : {{ category.name }}</div>
        <div class="grid grid-cols-3 gap-6">
            <div class="rounded-lg bg-white" v-if="products.length !== 0" v-for="product in products">
                <card :product="product"></card>
            </div>
        </div>
    </ecommerce-layout>
</template>

<style scoped>

</style>
