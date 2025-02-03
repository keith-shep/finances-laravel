<template>    
    
    <form>
        <div class="flex">
            <label class="block" for="start">From:</label>
            <input type="month" id="start" name="from" v-model="form.from" min="2024-01" max="2025-12" @change="form.get('/finances')"/>
            
            <label class="block" for="end">To:</label>
            <input type="month" id="end" name="to" v-model="form.to" min="2024-01" max="2025-12" @change="form.get('/finances')"/>
        </div>

        <div v-for="option in options">
            <input type="checkbox" :value="option.value" v-model="form.category_ids"  @change="form.get('/finances')"/>
            <label class="ml-1"><a class="underline" :href="`/categories/${option.value}`">{{ option.name }}</a></label>
        </div>

        
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