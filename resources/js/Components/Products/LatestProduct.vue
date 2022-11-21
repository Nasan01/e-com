<script setup>
    import ProductCard from './ProductCard.vue';

    const props = defineProps(['products']);
</script>

<template>
    <div class="bg-gray-100">
        <h1 class="text-3xl pl-28 pt-5 text-gray-700">New Arrival</h1>
        <div class="flex px-28 py-5 flex-wrap">
            <div v-for="product in props.products" :key="product.id">
                <ProductCard :product="product" />
            </div>
        </div>
    </div>
</template>
