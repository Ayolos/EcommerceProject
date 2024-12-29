<script setup>
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    product: Object,
})

</script>

<template>
<Link :href="route('products.show', props.product.id)">
    <img class="rounded-t-lg" :src="props.product.image" alt="product.name">
    <div class="p-4 flex flex-col gap-2">
        <h2 class="font-bold">{{ props.product.name }}</h2>
        <p class="text-gray-400 text-sm">{{ props.product.description }}</p>
        <p class="font-bold">{{ props.product.price }} Euros</p>
    </div>
</Link>
</template>

<style scoped>

</style>
