<template>
    <Head title="finances" />

    <form action="finances">
        <label for="start">Start date:</label>
        <input type="date" id="start" name="from" value="2024-08-09" min="2024-01-01" max="2024-12-31" />

        <label for="end">End date:</label>
        <input type="date" id="end" name="to" value="2024-10-09" min="2024-01-01" max="2024-12-31" />

        <button>Submit</button>
    </form>
    

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">Transaction Date</th>
                <th class="px-6 py-3">Reference</th>
                <th class="px-6 py-3">Debit Amount</th>
                <th class="px-6 py-3">Credit Amount</th>
                <th class="px-6 py-3">Ref1</th>
                <th class="px-6 py-3">Ref2</th>
                <th class="px-6 py-3">Ref3</th>
                <th class="px-6 py-3">Description</th>
            </tr>
        </thead>

        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="transaction in transformedData">
                <td class="px-6 py-3">{{ transaction.transaction_date }}</td>
                <td class="px-6 py-3">{{ transaction.reference }}</td>
                <td class="px-6 py-3">{{ transaction.debit_amount }}</td>
                <td class="px-6 py-3">{{ transaction.credit_amount }}</td>
                <td class="px-6 py-3">{{ transaction.ref1 }}</td>
                <td class="px-6 py-3">{{ transaction.ref2 }}</td>
                <td class="px-6 py-3">{{ transaction.ref3 }}</td>
                <td class="px-6 py-3">{{ transaction.description }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script setup>
import { Head } from '@inertiajs/vue3'
import { reactive, computed } from 'vue'

const props = defineProps({ 
  user: Object,
  transactions: Array,
})

const transformedData = computed(() => {
    return props.transactions;
})


</script>