<template>
    
    <form>
        <label for='upload_csv'>Upload CSV:</label>
        <input id='upload_csv' class='ml-3' type="file" @input="form.file = $event.target.files[0]" accept=".csv"/>
        <select v-model="form.selected_bank_account">
            <option v-for="option in bank_accounts" :value="option.id">{{ option.name }}</option>
        </select>
        <Button @click.prevent="form.post('/importCsv')" :disabled="!form.file">Import</Button>
    </form>
    
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import Button from './Button.vue';

function submit() {
  form.post('/importCsv')
}

const props = defineProps({ 
    bank_accounts: Array,
})

const form = useForm({  
    file: null,
    selected_bank_account: null
})


</script>