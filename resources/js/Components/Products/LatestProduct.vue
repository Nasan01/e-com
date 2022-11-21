<script setup>
    import ProductCard from './ProductCard.vue';

    const props = defineProps(['products']);
</script>

<template>
    <div class="shadow-inner bg-gray-100">
        <h1 class="text-3xl pl-28 pt-5 text-gray-700">New Arrival</h1>
        <div class="flex py-5 flex-wrap justify-center items-center">
            <div v-for="product in props.products" :key="product.id">
                <ProductCard :product="product" />
            </div>
        </div>
    </div>
</template>
