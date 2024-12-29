<script setup>

const searchValue = defineModel('searchValue')

</script>

<template>
    <input
        v-model="searchValue"
        type="text"
        class="border border-gray-300 rounded-lg p-2"
        placeholder="Rechercher un produit">
</template>

<style scoped>

</style>
