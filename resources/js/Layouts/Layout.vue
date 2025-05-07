<template>
    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <Link :href="route('home')" class="nav-link">Home</Link>
                </div>
                <div class="space-x-6">
                    <Link :href="route('register')" class="nav-link"
                        >register</Link
                    >
                </div>
            </nav>
        </header>
        <main>
            <slot></slot>
        </main>
    </div>
</template>
