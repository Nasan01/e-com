<script>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { mapGetters } from 'vuex';


export default {

    setup() {
        const formLogout = useForm();
        const logout = () => {
            formLogout.post(route('logout'));
        }

        return { formLogout, logout };
    },

    components: {
        Link,
        ApplicationLogo
    },

    computed: {
        ...mapGetters(['cartCount']),
    },

}



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
                        <Link href="#">Shop</Link>
                    </li>
                    <template v-if="$page.props.auth.user">
                        <li>
                            <Link href="#">Dashboard</Link>
                        </li>
                        <li>
                            <a @click="logout">Signout</a>
                        </li>
                    </template>
                    <template v-else>
                        <li>
                            <Link :href="route('register')">Signup</Link>
                        </li>
                        <li>
                            <Link :href="route('login')">Signin</Link>
                        </li>
                    </template>
                    <li>
                        <Link class="btn btn-primary text-white text-sm px-3" :href="route('shops.cart')" >
                            <i class="fa fa-cart-shopping"></i> Cart {{ cartCount }}
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <slot />
        </div>
    </div>
</template>
