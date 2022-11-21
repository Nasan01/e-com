<script setup>

const props = defineProps(['product']);

</script>

<template>
    <div class="flex mx-10 overflow-hidden items-center rounded bg-white shadow-md">
        <div class="w-1/3">
            <legend class="m-2">
                <img
                    :src="'/assets/images/'+product.illustration"
                    :alt="product.name"
                    class="h-80 w-64 rounded"
                />
            </legend>
        </div>
        <div class="w-2/3 px-3">
            <h1 class="text-xl font-bold">{{ product.name }}</h1>
            <h3 class="text-gray-500">
                {{ product.description }}
            </h3>
            <div>
                <p>In Stock</p>
                <p class="px-3 py-1 w-32 text-center rounded bg-primary text-white my-2">{{ product.category.name }}</p>
                <button class="btn btn-primary w-80 text-white my-2">Add To Cart</button>
            </div>
        </div>
    </div>
</template>
