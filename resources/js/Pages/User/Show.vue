<template>
  <!-- <Layout> -->
    <Head title="finances" />

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">Transaction Date</th>
                <th class="px-6 py-3">Reference</th>
                <th class="px-6 py-3">Credit Amount</th>
                <th class="px-6 py-3">Debit Amount</th>
                <th class="px-6 py-3">Ref1</th>
                <th class="px-6 py-3">Ref2</th>
                <th class="px-6 py-3">Ref3</th>
                <th class="px-6 py-3">Description</th>
            </tr>
        </thead>

        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="transaction in transactions">
                <td class="px-6 py-3">{{ transaction.transaction_date }}</td>
                <td class="px-6 py-3">{{ transaction.reference }}</td>
                <td class="px-6 py-3">{{ transaction.credit_amount }}</td>
                <td class="px-6 py-3">{{ transaction.debit_amount }}</td>
                <td class="px-6 py-3">{{ transaction.ref1 }}</td>
                <td class="px-6 py-3">{{ transaction.ref2 }}</td>
                <td class="px-6 py-3">{{ transaction.ref3 }}</td>
                <td class="px-6 py-3">{{ transaction.description }}</td>
            </tr>
        </tbody>
    </table>
  <!-- </Layout> -->
</template>

<script setup>
// import Layout from './Layout'
import { Head } from '@inertiajs/vue3'

defineProps({ 
  user: Object,
  transactions: Array,
})
</script>