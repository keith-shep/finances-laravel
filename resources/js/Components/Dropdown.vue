<template>    
    <select>
        <option v-for="option in options" :value="option.value">{{ option.name }}</option>
    </select>
    
</template>

<script setup>

import { reactive, computed } from 'vue'


const props = defineProps({ 
    options: Array,
})

</script>