<template>    
    <form>
        <template v-for="option in options">
            <input type="checkbox" :value="option.value" v-model="form.checkedCategoryIds" />
            <label for="jack">{{ option.name }}</label>
        </template>
        
    </form>
</template>

<script setup>

import { reactive, computed } from 'vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({ 
    options: Array,
})


const form = useForm({  
    checkedCategoryIds: []
})

</script>