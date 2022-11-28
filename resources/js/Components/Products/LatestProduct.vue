<script setup>
    import ProductCard from './ProductCard.vue';

    const props = defineProps(['products']);
</script>

<template>
    <div class="shadow-inner bg-base-300">
        <slot name="title" />
        <div class="flex py-5 flex-wrap justify-center items-center">
            <div v-for="product in props.products" :key="product.id">
                <ProductCard :product="product" />
            </div>
        </div>
    </div>
</template>
