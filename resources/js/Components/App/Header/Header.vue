<script setup>
import Logo from "@/Components/App/Logo.vue";
import {Link, router} from "@inertiajs/vue3";
import SearchBar from "@/Components/App/Input/SearchBar.vue";
import {computed, ref} from "vue";
import axios from "axios";

const searchValue = ref('');

const suggestions = ref([]);
const suggestionsError = ref('');

const handleSearch = () => {
    router.visit(route('search'), {
        methods: 'get',
        data: {
            query: searchValue.value
        }
    });
}

const fetchSuggestions = (search) => {
    if (search.length >= 3){
        axios.get(route('suggestion'), {
            params: {
                query: search
            }
        }).then(response => {
            console.log(response.data);
            if (response.data.length === 0) {
                suggestions.value = [];
            } else {
                const products = response.data.products.data.map(product => {
                    return {
                        ...product,
                        type: 'product',
                    }
                });

                const categories = response.data.categories.data.map(category => {
                    return {
                        ...category,
                        type: 'category',
                    }
                });
                suggestions.value = [...categories, ...products];
                if (suggestions.value.length === 0) {
                    suggestionsError.value = 'Aucun résultat trouvé';
                }
            }
        }).catch(error => {
            suggestions.value = [];
        });
    }
    suggestions.value = [];
    suggestionsError.value = '';
}

const routeManager = (routeType, id) => {
    return routeType === 'product' ? route('products.show', id) : route('categories.show',  id);
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
                        <Link v-for="suggestion in suggestions" :href="routeManager(suggestion.type, suggestion.id)">
                            <li class="py-2">{{ suggestion.name }} <span class="bg-gray-500 p-1 text-sm rounded">{{suggestion.type}}</span></li>
                        </Link>
                    </ul>
                </div>
                <div v-else-if="suggestionsError" class="absolute -bottom-30 h-48 bg-red-400 p-2 rounded-lg">
                    <p>{{ suggestionsError }}</p>
                </div>
            </div>
            <Link :href="route('home')">Home</Link>
            <Link :href="route('products.index')">Produit</Link>
            <Link :href="route('carts.index')">Panier</Link>
        </div>
    </div>
</template>

<style scoped>

</style>
