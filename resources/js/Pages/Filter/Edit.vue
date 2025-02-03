<template>
    <Head v-if='mode == "new"' title="create new filter" />
    <Head v-if='mode == "edit"' :title="filter?.name" />
    
    <Link class="block bg-blue-500 text-white rounded-full py-2 px-4" :href="`/categories/${category_id}`" as="button">Back</Link>

    <h1 v-if='mode == "new"'>{{ 'create new filter'}}</h1>
    <h1 v-if='mode == "edit"'>{{ filter?.name }}</h1>

    <div class="grid grid-cols-6 gap-4 ">
        <div class="col-span-4">
            <form>
                <label class="block">column_name</label>
                <input class="block border-blue-500 border-2" type="text" v-model="form.column_name">
            
                <label class="block">pattern</label>
                <input class="block border-blue-500 border-2" type="text" v-model="form.pattern"></input>

                <button v-if="mode == 'edit'"
                    class="block bg-blue-500 text-white rounded-full py-2 px-4" 
                    type="submit" 
                    @click.prevent="form.put(`/categories/${category_id}/filters/${filter.id}`)"
                >
                    update
                </button>

                <button v-if="mode == 'new'"
                    class="block bg-blue-500 text-white rounded-full py-2 px-4" 
                    type="submit" 
                    @click.prevent="form.post(`/categories/${category_id}/filters`)"
                >
                    create
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { Head, useForm, Link, } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({ 
    filter: Object,
    category_id: Number,
})



const mode = computed(() => {
    if (!!props?.filter?.id){
        return 'edit';
    }
    return 'new';
})


const form = useForm({  
    column_name: props.filter?.column_name ?? '',
    pattern: props.filter?.pattern ?? '',
})

</script>