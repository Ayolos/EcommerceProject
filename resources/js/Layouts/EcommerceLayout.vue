<script setup>
import { Head } from "@inertiajs/vue3";
import Header from "@/Components/App/Header/Header.vue";

defineProps({
    title: String,
});

</script>

<template>
    <div>
        <Head :title="title" />
        <div class="min-h-screen bg-gray-100">
            <Header></Header>
            <slot></slot>
        </div>
    </div>
</template>

<style scoped>

</style>
