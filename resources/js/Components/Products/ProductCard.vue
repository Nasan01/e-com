<script setup>
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['product']);

</script>

<template>
    <div class="flex flex-col w-80 m-6 shadow-lg bg-white text-gray-600 rounded overflow-hidden hover:scale-110 hover:shadow-2xl transition duration-500">
        <legend>
            <img
                :src="'/assets/images/'+product.illustration"
                :alt="product.name"
                class="h-48 w-80"
            />
        </legend>
        <div class="flex m-2 justify-between">
            <div>
                <h3 class="bg-primary text-white px-4 rounded">
                    {{ product.category.name }}
                </h3>
            </div>
            <div>
                <h3 class="text-gray-700">
                    {{ product.price }} {{ product.unit }}
                </h3>
            </div>
        </div>
        <div class="text-center m-2">
            <h2 class="font-bold text-lg">{{ product.name.slice(0, 20) }}</h2>
            <h4 class="text-gray-500 text-sm">
                {{ product.description.slice(0, 35) }} ...
            </h4>
        </div>
        <div class="flex h-8">
            <div class="w-1/2 bg-gray-300 uppercase text-center">
                <h1>
                    <Link :href="route('products.show', product)">View Product</Link>
                </h1>
            </div>
            <div class="w-1/2 bg-primary text-white uppercase text-center">
                <h1>Add To Cart</h1>
            </div>
        </div>
    </div>
</template>
