<script setup>
import {computed, defineProps, ref, watch} from 'vue';
import EcommerceLayout from "@/Layouts/EcommerceLayout.vue";
import Button from "@/Components/App/Cart/Button.vue";

const props = defineProps({
    product: Object,
})

const quantity = ref(1);

// watch(
//     () => props.product.stock,
//     (newStock) => {
//         stock.value = newStock;
//         if (quantity.value > newStock) {
//             quantity.value = newStock;
//         }
//     }
// );
//
// window.Echo.private('product.' + props.product.id)
//     .listen('ProductStockEvent', (e) => {
//         stock.value = e.product.stock;
//     });

</script>

<template>
    <EcommerceLayout>
        <div>
            <h1>LE PRODUIT</h1>
            <img class="rounded-t-lg" :src="product.image" :alt="product.name">
            <div class="p-4 flex flex-col gap-2">
                <h2 class="font-bold">{{ product.name }}</h2>
                <p class="text-gray-400 text-sm">{{ product.description }}</p>
                <p class="font-bold">{{ product.price }} Euros</p>
            </div>
            <Button :product-id="product.id" :quantity="quantity" v-if="product.stock_actual > 0"></Button>
            <select v-model="quantity" v-if="product.stock_actual > 0">
                <option v-for="i in product.stock_actual" :key="i" :value="i">{{ i }}</option>
            </select>
            <div>En stock: {{ product.stock_actual }}</div>
        </div>
    </EcommerceLayout>
</template>

<style scoped>

</style>
