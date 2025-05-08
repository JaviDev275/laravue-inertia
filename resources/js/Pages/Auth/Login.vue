<script setup>
import { reactive } from "vue";
import { useForm } from "@inertiajs/vue3";
import TextInput from "../components/TextInput.vue";

const form = useForm({
    email: null,
    password: null,
    remember: null,
});

const submit = () => {
    form.post("/login", {
        onError: () => form.reset("password", "remember"),
    });
};
</script>

<template>
    <Head title="| Login" />
    <h1 class="title">Iniciar Sesion</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
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
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-2">
                    <label for="remember">Recordarme</label>
                    <input
                        type="checkbox"
                        v-model="form.remember"
                        id="remember"
                    />
                </div>

                <p class="text-slate-600">
                    ¿Necesitas una cuenta?
                    <a :href="route('register')" class="text-link"
                        >Registrate</a
                    >
                </p>
            </div>
            <div>
                <button
                    type="submit"
                    class="primary-btn"
                    :disabled="form.processing"
                >
                    Iniciar Sesion
                </button>
            </div>
        </form>
    </div>
</template>
