<script setup>

import GuestLayout from '@/Layouts/GuestLayout.vue';
import ProductHorizontalCard from '@/Components/Products/ProductHorizontalCard.vue';
import ProductCard from '@/Components/Products/ProductCard.vue';
import { Head } from '@inertiajs/inertia-vue3';

const props = defineProps(['product', 'relatedProducts']);

</script>

<template>
    <Head />

    <GuestLayout>
        <div class="flex flex-col items-center bg-gray-100 px-20 py-2">
            <ProductHorizontalCard :product="props.product" />
            <div class="flex justify-start my-5">
                <h2 class="text-gray-700 text-3xl">Related Products</h2>
            </div>
            <div class="flex flex-wrap">
                <div v-for="relatedProduct in props.relatedProducts" :key="relatedProduct.id">
                    <ProductCard :product="relatedProduct" />
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
