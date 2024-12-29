<script setup>

import Card from "@/Components/App/Product/Card.vue";
import EcommerceLayout from "@/Layouts/EcommerceLayout.vue";
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    products: Array,
    categories: Array,
})
</script>

<template>
    <EcommerceLayout>
        <div class="p-6">
            <h1>Search</h1>
            <div v-if="categories.length !== 0" class="flex flex-row gap-4 py-4">
                <Link v-for="category in categories" :href="route('categories.show', category.id)" class="bg-red-500 rounded text-center">
                    <h2>{{ category.name }}</h2>
                </Link>
            </div>
            <div class="grid grid-cols-3 gap-6">
                <div class="rounded-lg bg-white" v-if="products.length !== 0" v-for="product in props.products">
                    <Card :product="product"></Card>
                </div>
            </div>
        </div>
    </EcommerceLayout>
</template>

<style scoped>

</style>
