<template>
    <!-- <form >
        <label for="import_csv">Import CSV</label>
        <input type="file" id="import_csv" name="import_csv" accept=".csv" />
    </form> -->

    
    <form>
        <label for='upload_csv'>Upload CSV:</label>
        <input id='upload_csv' class='ml-3' type="file" @input="form.file = $event.target.files[0]" accept=".csv"/>
        
        <!-- <label for='account_name'>Account Name:</label>
        <input id='account_name' v-model='form.account_name' class='border-2 ml-3' type="input"/>

        <label for='account_type'>Account Type:</label>
        <select v-model="form.account_type">
            <option value="individual">Individual</option>
            <option value="joint">Joint</option>
        </select> -->
        
        <!-- <button class="block bg-blue-500 text-white rounded-full py-2 px-4" type="submit">Import</button> -->
        <select v-model="form.selected_bank_account">
            <option v-for="option in bank_accounts" :value="option.id">{{ option.name }}</option>
        </select>
        <Button @click.prevent="form.post('/importCsv')">Import</Button>
    </form>
    
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { reactive, computed } from 'vue'
import Button from './Button.vue';

function submit() {
  form.post('/importCsv')
}

const props = defineProps({ 
    bank_accounts: Array,
})

const form = useForm({  
    file: null,
    // account_name: '',
    // account_type: '',
    selected_bank_account: null
})


</script>