<template>
    <Head :title="category_name" />

    <h1>{{ category_name }}</h1> 
    <div class="grid grid-cols-6 gap-4 ">
        <div class="col-span-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3 whitespace-nowrap">Id</th>
                        <th class="px-6 py-3">Column Name</th>
                        <th class="px-6 py-3">Pattern</th>
                    </tr>
                </thead>

                <template v-if="!rows.length">
                    No data was found.
                </template>

                <tbody v-else>
                    <tr v-for="row in rows" class="bg-white border-b">
                        <td class="px-6 py-3">{{ row.id }}</td>
                        <td class="px-6 py-3">{{ row.column_name }}</td>
                        <td class="px-6 py-3">{{ row.pattern }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/vue3'

const props = defineProps({ 
    category_name: String,
    rows: Array,
})


</script>