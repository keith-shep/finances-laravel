<template>
    <Head :title="filter.name" />

    

    <Link class="block bg-blue-500 text-white rounded-full py-2 px-4" :href="`/categories/${filter.category_id}`" as="button">Back</Link>

    <h1>{{ filter.name }}</h1> 
    <div class="grid grid-cols-6 gap-4 ">
        <div class="col-span-4">
            <form>
                <label class="block">column_name</label>
                <input class="block border-blue-500 border-2" type="text" v-model="form.column_name">
            
                <label class="block">pattern</label>
                <input class="block border-blue-500 border-2" type="text" v-model="form.pattern"></input>

                <button 
                    class="block bg-blue-500 text-white rounded-full py-2 px-4" 
                    type="submit" 
                    @click.prevent="form.put(`/filters/${filter.id}`)"
                >
                    update
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3'

const props = defineProps({ 
    filter: Object
    // category_name: String,
    // rows: Array,
})


const form = useForm({  
    column_name: props.filter.column_name,
    pattern: props.filter.pattern,
})

</script>