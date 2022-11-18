<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <div>
        <div class="navbar bg-base-100 shadow">
            <div class="flex-1">
                <a class="btn btn-ghost normal-case text-xl">
                    <ApplicationLogo />
                </a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal p-0 text-2xs">
                    <li>
                        <Link :href="route('home')">Home</Link>
                    </li>
                    <li>
                        <Link :href="route('register')">Signup</Link>
                    </li>
                    <li>
                        <Link :href="route('login')">Signin</Link>
                    </li>
                    <li><a class="btn btn-primary text-white text-sm px-3"><i class="fa fa-cart-shopping"></i> Cart</a></li>
                </ul>
            </div>
        </div>
        <div>
            <slot />
        </div>
    </div>
</template>
