<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import LatestProduct from '@/Components/Products/LatestProduct.vue';

const props = defineProps(['latestProducts']);

</script>

<template>
    <Head title="Home" />

    <GuestLayout>
        <LatestProduct :products="props.latestProducts" />
    </GuestLayout>

</template>
