<script>
import { Link } from '@inertiajs/inertia-vue3';
import { mapMutations } from 'vuex';

export default {
    components: {
        Link
    },

    props: ['product'],

    data() {
        return {
            quantity: 1
        }
    },

    methods: {
        ...mapMutations(['remove', 'calculateTotal']),

        removeToCart(e) {
            this.remove(this.product);
        },

        handleQuantityChange(e) {
            this.quantity = e.target.value;

            this.calculateTotal({
                cart: this.product,
                quantity: this.quantity
            });
        },
    }
}

</script>

<template>
    <div class="flex flex-col w-80 m-6 shadow-lg bg-base-100 text-gray-600 rounded overflow-hidden hover:scale-110 hover:shadow-2xl transition duration-500">
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
        <div class="m-3 text-xs">
            <label for="quantity m-2" class="w-1/5">Quantity : </label>
            <input
                type="number"
                class="w-4/5 px-4 py-1 rounded focus:border-primary border border-gray-200 bg-gray-100"
                :value="quantity"
                @input="handleQuantityChange"
                min="1"
            />
        </div>
        <div class="flex h-8">
            <div class="w-1/2 bg-gray-300 uppercase text-center">
                <h1>
                    <Link :href="route('products.show', product)">View Product</Link>
                </h1>
            </div>
            <div class="w-1/2 bg-red-500 text-white uppercase text-center">
                <button @click="removeToCart">Remove Product <i class="fa fa-trash"></i> </button>
            </div>
        </div>
    </div>
</template>
