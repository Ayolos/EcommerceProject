<script setup>
import { defineProps } from 'vue';
import EcommerceLayout from "@/Layouts/EcommerceLayout.vue";

const props = defineProps({
    product: Object,
})
</script>

<template>
    <EcommerceLayout>
        <div>
            <h1>LE PRODUIT</h1>
            <img class="rounded-t-lg" :src="props.product.image" :alt="product.name">
            <div class="p-4 flex flex-col gap-2">
                <h2 class="font-bold">{{ props.product.name }}</h2>
                <p class="text-gray-400 text-sm">{{ props.product.description }}</p>
                <p class="font-bold">{{ props.product.price }} Euros</p>
            </div>
        </div>
    </EcommerceLayout>
</template>

<style scoped>

</style>
