<template>
    <!-- <form >
        <label for="import_csv">Import CSV</label>
        <input type="file" id="import_csv" name="import_csv" accept=".csv" />
    </form> -->

    
    <form @submit.prevent="submit">
        <input type="file" @input="form.file = $event.target.files[0]" accept=".csv"/>
        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
            {{ form.progress.percentage }}%
        </progress>
        <button class="block bg-blue-500 text-white rounded-full py-2 px-4" type="submit">Import</button>
    </form>
    
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { reactive, computed } from 'vue'


function submit() {
  form.post('/importCsv')
}

const form = useForm({  
    file: null
})


</script>