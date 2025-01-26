<template>
    <Link class="block bg-blue-500 text-white rounded-full py-2 px-4 float-right" :href='`/categories/${category_id}/new`' as="button">Add new</Link>
    <Head :title="category_name" />

    <Link class="block bg-blue-500 text-white rounded-full py-2 px-4" href="/finances" as="button">Back</Link>

    <h1>{{ category_name }}</h1>
    <div class="">
        <div class="col-span-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3 whitespace-nowrap">Id</th>
                        <th class="px-6 py-3">Column Name</th>
                        <th class="px-6 py-3">Pattern</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>

                <template v-if="!rows.length">
                    No data was found.
                </template>

                <tbody v-else>
                    <tr v-for="row, index in rows" class="bg-white border-b">
                        <td class="px-6 py-3">{{ row.id }}</td>
                        <td class="px-6 py-3">{{ row.column_name }}</td>
                        <td class="px-6 py-3">{{ row.pattern }}</td>
                        <td class="px-6 py-3">
                            <a href="javascript:void(0)" @click="() => toggleDropdown(index)">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </a>
                            <ul :id="`dropdown-${index}`" class="hidden absolute">
                                <li>
                                    <a :href="`/categories/${category_id}/edit/${row.id}`">edit</a>
                                </li>
                                <li>
                                    delete
                                </li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3'

const props = defineProps({ 
    category_id: Number,
    category_name: String,
    rows: Array,
})


function toggleDropdown(index) {
    const dropdown = document.querySelector(`#dropdown-${index}`);
    if (dropdown.style.display == 'block') {
        dropdown.style.display = 'none';
    } else {
        dropdown.style.display = 'block';
    };
}
</script>