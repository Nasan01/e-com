<script>

import GuestLayout from '@/Layouts/GuestLayout.vue';
import ProductCart from '@/Components/Products/ProductCart.vue';
import { Head,Link } from '@inertiajs/inertia-vue3';
import { mapGetters, mapState } from 'vuex';

export default {
    components: {
        Head,
        GuestLayout,
        ProductCart,
        Link
    },

    computed: {
        ...mapState({
            cart: state => state.cart,
        }),

        ...mapGetters(['cartCount', 'total']),

        cartEmpty() {
            return this.cartCount === 0;
        }
    }
}

</script>

<template>
    <Head title="Cart" />

    <GuestLayout>
        <div class="sm:mx-14 m-2">
            <div>Total : {{ total }} Ariary</div>

            <div v-if="!$page.props.auth.user">
                <div class="alert alert-error text-white w-40 m-2">User Not Found! </div>
                <div class="m-2">
                    <Link :href="route('login')" class="btn btn-primary px-4">
                        Sign In To CheckOut
                    </Link>
                </div>
            </div>
            <div v-else>

            </div>
        </div>
        <h1 class="text-gray-700 text-xl sm:mx-14 m-2">Your cart has {{ cartCount }} Items</h1>
        <div class="flex justify-start flex-wrap  sm:mx-14 m-2">
            <div v-if="cartEmpty">
                <h1 class="text-2xl m-8">Cart is Empty <i class="fa fa-smile text-yellow-500"></i></h1>
            </div>
            <template v-else>
                <div v-for="c in cart" :key="c.id">
                    <ProductCart :product="c" />
                </div>
            </template>
        </div>
    </GuestLayout>
</template>
