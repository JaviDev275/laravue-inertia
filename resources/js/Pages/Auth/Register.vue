<script setup>
import { reactive } from "vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const submit = () => {
    form.post("/register");
};
</script>

<template>
    <Head title="`| Register" />
    <h1 class="title">Register a new accounts</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <div class="mb-4">
                <label>Name</label>
                <input type="text" v-model="form.name" />
                <small>{{ form.errors.name }}</small>
            </div>
            <div class="mb-4">
                <label>Email</label>
                <input name="email" type="text" v-model="form.email" />
                <small>{{ form.errors.email }}</small>
            </div>
            <div class="mb-4">
                <label>Password</label>
                <input name="password" type="text" v-model="form.password" />
                <small>{{ form.errors.password }}</small>
            </div>
            <div class="mb-4">
                <label>Confirm Password</label>
                <input
                    name="password_confirmation"
                    type="text"
                    v-model="form.password_confirmation"
                />
            </div>
            <div>
                <p class="text-slate-600 mb-2">
                    Al ready a user?
                    <a href="/" class="text-link">Login</a>
                </p>
                <button type="submit" class="primary-btn">Register</button>
            </div>
        </form>
    </div>
</template>
