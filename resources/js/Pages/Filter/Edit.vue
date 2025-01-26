<template>
    <Head :title="category_name" />

    <h1>{{ category_name }}</h1> 
    <div class="grid grid-cols-6 gap-4 ">
        <div class="col-span-4">
            {{ filter }}
        </div>
    </div>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/vue3'

const props = defineProps({ 
    filter: Object
    // category_name: String,
    // rows: Array,
})


</script>