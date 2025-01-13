<script setup>

import EcommerceLayout from "@/Layouts/EcommerceLayout.vue";

const props = defineProps({
    cart: Object,
})
</script>

<template>
    <ecommerce-layout title="Panier">
        <div>
            Panier
        </div>
        <div class="flex-col space-y-5">
            <div class="py-2 px-4 bg-gray-200 border border-gray-100 flex flex-col space-y-3">
                <h3>Panier n{{ cart.id }}</h3>
                <div
                    v-for="product in cart.products"
                    :key="product.id"
                    class="flex flex-inline justify-between"
                >
                    <h1>{{ product.name }}</h1>
                    <p>{{ product.price }} euros</p>
                    <!--                <select-->
                    <!--                    @change="quantityUpdate(id, $event.target.value)"-->
                    <!--                    v-model="quantities[index]">-->
                    <!--                    <option v-for="i in 100" :key="i" :value="i">{{ i }}</option>-->
                    <!--                </select>-->
                    <p>{{product.quantity}}</p>
                    <!--                <Link as="button" class="p-2 bg-red-500 my-2 rounded" method="delete" :href="route('carts.destroy', product.id)">-->
                    <!--                    Supprimer-->
                    <!--                </Link>-->
                </div>
                <h6>
                    {{ cart.products.reduce((acc, p) => acc + p.quantity, 0) }} produits
                </h6>
                <h6>
                    Total: {{ cart.products.reduce((acc, p) => acc + p.price * p.quantity, 0) }} euros
                </h6>
            </div>
        </div>
<!--        <Link as="button" class="p-2 bg-red-500 my-2 rounded" method="delete" :href="route('carts.destroyAll')">-->
<!--            Vider le panier-->
<!--        </Link>-->
    </ecommerce-layout>
</template>

<style scoped>

</style>
