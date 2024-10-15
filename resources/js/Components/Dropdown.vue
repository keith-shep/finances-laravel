<template>    
    <form @change="form.put(`/finances/${transaction_id}`)">
        <select v-model="form.selected">
            <option v-for="option in options" :value="option.value">{{ option.name }}</option>
        </select>    
        
        <!-- <button class="block bg-blue-500 text-white rounded-full py-2 px-4" type="submit" :disabled="form.processing">Update</button> -->
    </form>
</template>

<script setup>

import { reactive, computed } from 'vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({ 
    transaction_id: Number,
    options: Array,
    selected_category_id: Number
})


const form = useForm({  
    selected: props.selected_category_id ?? null
})

</script>