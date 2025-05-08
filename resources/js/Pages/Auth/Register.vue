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
    form.post("/register", {
        onError: () => form.reset("password_confirmation", "password"),
    });
};
</script>

<template>
    <Head title="| Register" />
    <h1 class="title">Registre nuevas cuentas</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <div class="mb-4">
                <label>Nombre</label>
                <input type="text" v-model="form.name" />
                <small>{{ form.errors.name }}</small>
            </div>
            <div class="mb-4">
                <label>Correo electrónico</label>
                <input name="email" type="text" v-model="form.email" />
                <small>{{ form.errors.email }}</small>
            </div>
            <div class="mb-4">
                <label>Contraseña</label>
                <input
                    name="password"
                    type="password"
                    v-model="form.password"
                />
                <small>{{ form.errors.password }}</small>
            </div>
            <div class="mb-4">
                <label>Confirma Contraseña</label>
                <input
                    name="password_confirmation"
                    type="password"
                    v-model="form.password_confirmation"
                />
            </div>
            <div>
                <p class="text-slate-600 mb-2">
                    ¿Ya tienes una cuenta?
                    <a href="/" class="text-link">Inicia sesion</a>
                </p>
                <button
                    type="submit"
                    class="primary-btn"
                    :disabled="form.processing"
                >
                    Registrarse
                </button>
            </div>
        </form>
    </div>
</template>
