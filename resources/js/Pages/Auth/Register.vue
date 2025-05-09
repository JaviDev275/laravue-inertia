<script setup>
import { reactive } from "vue";
import { useForm } from "@inertiajs/vue3";
import TextInput from "../components/TextInput.vue";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    avatar: null,
});

const change = (e) => {
    form.avatar = e.target.files[0];
};

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
            <div>
                <label class="cursor-pointer" for="avatar">Avatar</label>
                <input
                    class="cursor-pointer"
                    id="avatar"
                    type="file"
                    @input="change"
                />
                <p>{{ form.errors.avatar }}</p>
            </div>
            <TextInput
                name="Nombre"
                v-model="form.name"
                :message="form.errors.name"
            />
            <TextInput
                name="Correo electrónico"
                v-model="form.email"
                :message="form.errors.email"
            />
            <TextInput
                name="Contraseña"
                type="password"
                v-model="form.password"
                :message="form.errors.password"
            />
            <TextInput
                name="Confirma Contraseña"
                type="password"
                v-model="form.password_confirmation"
            />
            <div>
                <p class="text-slate-600 mb-2">
                    ¿Ya tienes una cuenta?
                    <a :href="route('login')" class="text-link"
                        >Inicia sesion</a
                    >
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
