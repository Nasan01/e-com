<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import LatestProduct from '@/Components/Products/LatestProduct.vue';
import { computed } from 'vue';

const props = defineProps(['products']);


</script>

<template>
    <Head title="Home" />

    <GuestLayout>
        <LatestProduct :products="props.products">

        </LatestProduct>
    </GuestLayout>

</template>
