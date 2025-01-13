<script setup>
import {Link} from "@inertiajs/vue3";
import Button from "@/Components/App/Cart/Button.vue";

const props = defineProps({
    product: Object,
})

</script>

<template>
<Link :href="route('products.show', product.id)">
    <img class="rounded-t-lg" :src="product.image" alt="product.name">
    <div class="p-4 flex flex-col gap-2">
        <h2 class="font-bold">{{ product.name }}</h2>
        <p class="text-gray-400 text-sm">{{ product.description }}</p>
        <p class="font-bold">{{ product.price }} Euros</p>
    </div>
</Link>
</template>

<style scoped>

</style>
