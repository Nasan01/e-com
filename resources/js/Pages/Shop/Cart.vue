<script>

import GuestLayout from '@/Layouts/GuestLayout.vue';
import ProductCart from '@/Components/Products/ProductCart.vue';
import { Head,Link, useForm } from '@inertiajs/inertia-vue3';
import { mapGetters, mapState, mapMutations } from 'vuex';
import { Inertia } from '@inertiajs/inertia';

export default {

    components: {
        Head,
        GuestLayout,
        ProductCart,
        Link
    },

    data() {
        return {
            chooseCardPay: false,
            loading: false,
            form: {
                address: '',
                expires: '',
                card_number: '',
                cart: this.$store.state.cart
            }
        }
    },

    methods: {
        handleCardPayChosen() {
            // Just a loading's simulation
            setTimeout(() => {
                this.chooseCardPay = !this.chooseCardPay;
                this.loading = false;
            }, 2000);

            this.loading = true;
        },

        ...mapMutations(['clear']),

        submit(e) {
            Inertia.post(route('shops.cart.store'), this.form, {
                onSuccess: () => {
                    this.clear();
                }
            });
        }
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
            <div v-else class="m-4 sm:mx-12">
                <form @submit.prevent="submit">
                    <div class="m-2">
                        <label for="address" class="text-base-content">Delivery address : </label>
                        <textarea
                            name="address"
                            id="address"
                            rows="2"
                            class="w-full bg-base-300 rounded border-none focus:border focus:border-primary"
                            placeholder="Type your delivery address here..."
                            v-model="form.address"
                        ></textarea>
                    </div>
                    <div class="m-2" v-show="!chooseCardPay && !loading">
                        <h3>Choose a way to pay</h3>
                        <div class="border border-gray-300 rounded">
                            <ul>
                                <li class="text-lg px-2 py-4 cursor-pointer border border-gray-200" @click="handleCardPayChosen">
                                    <i class="fa fa-credit-card"></i> Card
                                </li>
                                <li class="text-lg px-2 py-4 cursor-pointer  border border-gray-200">
                                    <i class="fab fa-paypal"></i> PayPal <span class="badge badge-info text-white"> WIP feature</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="my-8 mx-2" v-show="loading">
                        <div class="bg-gray-100">
                            <div>
                                <div class="bg-gray-300 rounded w-full h-2 my-1"></div>
                                <div class="bg-gray-300 rounded w-full h-8 my-1"></div>
                            </div>
                            <div>
                                <div class="bg-gray-300 rounded w-full h-2 my-1"></div>
                                <div class="bg-gray-300 rounded w-full h-8 my-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="m-2 border border-gray-200 rounded p-8" v-show="chooseCardPay && !loading">
                        <div>
                            <label for="card_number">Card Number : </label>
                            <input
                                type="number"
                                class="px-3 py-2 border-none focus:border-primary-focus w-full rounded bg-base-300"
                                v-model="form.card_number"
                                name="card_number"
                            />
                        </div>
                        <div>
                            <label for="expires">Expires date : </label>
                            <input
                                type="date"
                                class="px-3 py-2 border-none focus:border-primary-focus w-full rounded bg-base-300"
                                name="expires"
                                v-model="form.expires"
                            />
                        </div>
                        <div class="text-center underline cursor-pointer">
                            <h3 @click="handleCardPayChosen">Choose another way to pay</h3>
                        </div>
                    </div>
                    <div class="m-2">
                        <button class="btn btn-primary text-center w-full">PAY</button>
                    </div>
                </form>
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
