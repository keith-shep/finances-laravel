<template>    
    <button class='block bg-blue-500 disabled:bg-blue-300 text-white rounded-full py-2 px-4' :disabled="props?.disabled ?? false">
        <slot></slot>
    </button>
</template>

<script setup>


const props = defineProps({
    disabled: Boolean,
})

</script>