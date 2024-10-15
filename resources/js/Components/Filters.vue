<template>    
    
    <form @submit.prevent="form.get('/finances')">
        <label class="block" for="start">Start date:</label>
        <input type="month" id="start" name="from" v-model="form.from" min="2024-01" max="2024-12" />
        
        <label class="block" for="end">End date:</label>
        <input type="month" id="end" name="to" v-model="form.to" min="2024-01" max="2024-12" />

        
        <template v-for="option in options">
            <input type="checkbox" :value="option.value" v-model="form.category_ids" />
            <label for="jack">{{ option.name }}</label>
        </template>

        <!-- submit -->
        <button class="block bg-blue-500 text-white rounded-full py-2 px-4" type="submit" :disabled="form.processing">Filter</button>
        
    </form>
    
</template>

<script setup>

import { reactive, computed } from 'vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({ 
    options: Array,
    to: String,
    from: String,
    category_ids: Array
})


const form = useForm({  
    from: props.from,
    to: props.to,
    category_ids: props.category_ids
})


</script>