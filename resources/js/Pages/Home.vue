<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import LatestProduct from '@/Components/Products/LatestProduct.vue';
import FormSearch from '@/Components/Products/FormSearch.vue';
import { computed } from 'vue';

const props = defineProps(['latestProducts', 'categories', 'title']);

const isTitle = computed(() => props.title === 'New Arrival');

</script>

<template>
    <Head title="Home" />

    <GuestLayout>
        <FormSearch :categories="props.categories" />
        <LatestProduct :products="props.latestProducts">
            <template #title>
                <template v-if="isTitle">
                    <h1>{{ props.title }}</h1>
                </template>
                <template v-else>
                    <b>{{ props.title }}</b>
                </template>
            </template>
        </LatestProduct>
    </GuestLayout>

</template>
