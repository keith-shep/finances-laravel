<template>
    
    <form>
        <select>
            <option v-for="option in options" :value="option.value">{{ option.name }}</option>
        </select>
    </form>
    
</template>

<script setup>

const props = defineProps({ 
    options: Array,
})


</script>