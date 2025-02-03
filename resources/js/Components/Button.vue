<template>    
    <button class='block text-white rounded-full py-2 px-4' :disabled="props?.disabled ?? false">
        <slot></slot>
    </button>
</template>

<script setup>


const props = defineProps({
    disabled: Boolean,
})

</script>