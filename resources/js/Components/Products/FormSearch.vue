<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps(['categories']);

const form = useForm({
    category: 0,
    search: ''
});

const submit = (e) => {
    form.post(route('home.products.search'));
};

</script>

<template>
    <div class="bg-base-300">
        <form class="flex shadow p-1 rounded justify-center" @submit.prevent="submit">
            <div class="sm:w-1/6 m-2 shadow-lg">
                <select
                    name="category"
                    id="category"
                    class="form-select rounded w-full border-none outline-none focus:border border-primary-focus py-3"
                    v-model="form.category"
                >
                    <option value="all" selected key="0">All</option>
                    <option v-for="category in categories" :key="category.id" :value="category.id">
                        {{ category.name }}
                    </option>
                </select>
            </div>
            <div class="sm:w-3/6 m-2 shadow-lg">
                <input
                    type="text"
                    name="search"
                    id="search"
                    class="px-3 py-3 outline-none rounded bg-base-200 border-none w-full focus:border border-primary-focus"
                    placeholder="Search..."
                    v-model="form.search"
                />
            </div>
            <div class="sm:w-1/6 m-2 shadow-lg">
                <button class="btn btn-primary text-white w-full">submit</button>
            </div>
        </form>
    </div>
</template>
