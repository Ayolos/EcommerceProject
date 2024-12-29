<script setup>

import EcommerceLayout from "@/Layouts/EcommerceLayout.vue";
import Card from "@/Components/App/Product/Card.vue";

const props = defineProps({
    products: Array,
    categories: Array,
})
</script>

<template>
    <EcommerceLayout title="Produit">
        <div>
            Produit
        </div>
        <div class="grid grid-cols-3 gap-6">
            <div class="rounded-lg bg-white" v-for="product in props.products">
                <Card :product="product"></Card>
            </div>
        </div>
    </EcommerceLayout>
</template>

<style scoped>

</style>
