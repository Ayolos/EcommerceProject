<script setup>
import Logo from "@/Components/App/Logo.vue";
import {Link, router} from "@inertiajs/vue3";
import SearchBar from "@/Components/App/Input/SearchBar.vue";
import {computed, ref} from "vue";
import axios from "axios";

const searchValue = ref('');

const suggestions = ref([]);

const handleSearch = () => {
    console.log(searchValue.value);
    router.visit(route('search'), {
        methods: 'get',
        data: {
            search: searchValue.value
        }
    });
}

const fetchSuggestions = (search) => {
    axios.get(route('suggestion'), {
        params: {
            search: search
        }
    }).then(response => {
        suggestions.value = response.data;
    });
}

</script>

<template>
    <div class="flex flex-row justify-between items-center px-4 py-2">
        <Logo class="size-12"></Logo>
        <div class="flex-inline flex gap-4 items-center">
            <div class="relative">
                <SearchBar
                    v-model:search-value="searchValue"
                    @input="fetchSuggestions(searchValue)"
                    @keydown.enter="handleSearch"
                ></SearchBar>
                <div v-if="suggestions.length !== 0" class="absolute -bottom-30 h-48 overflow-scroll bg-red-400 p-2 rounded-lg">
                    <ul>
                        <Link v-for="suggestion in suggestions" :href="route('products.show', suggestion.id)">
                            {{suggestion}}
                            <li>{{suggestion.name}}</li>
                        </Link>
                    </ul>
                </div>
            </div>
            <Link :href="route('home')">Home</Link>
            <Link :href="route('products.index')">Produit</Link>
        </div>
    </div>
</template>

<style scoped>

</style>
