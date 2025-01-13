<script setup>
import {router, useForm} from "@inertiajs/vue3";
import {route} from "../../../../../vendor/tightenco/ziggy/src/js/index.js";
import {watch} from "vue";

const props = defineProps({
    productId: Number,
    quantity: Number,
});

const form = useForm({
    products: [
        {
            id: props.productId,
            quantity: props.quantity,
        }
    ]
});

watch(() => props.quantity, (newQuantity) => {
    form.products[0].quantity = newQuantity;
});

const addToCart = async () => {
    form.post(route('carts.store'), {
        onSuccess: () => {
            console.log('success');
            router.reload({ only: ['product'] });
        },
        onError: () => {
            alert('error');
        }
    });
};
</script>

<template>
    <button
        @click="addToCart"
        class="bg-red-500 p-2 rounded"
    >
        Ajouter {{ quantity }} au panier
    </button>
</template>

<style scoped>

</style>
