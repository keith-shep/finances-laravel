<template>
  <!-- <Layout> -->
    <Head title="finances" />

    <table>
        <thead>
            <tr>
                <th>Transaction Date</th>
                <th>Reference</th>
                <th>Credit Amount</th>
                <th>Debit Amount</th>
                <th>Ref1</th>
                <th>Ref2</th>
                <th>Ref3</th>
                <th>Description</th>
            </tr>
        </thead>

        <tbody>
            <tr v-for="transaction in transactions">
                <td>{{ transaction.transaction_date }}</td>
                <td>{{ transaction.reference }}</td>
                <td>{{ transaction.credit_amount }}</td>
                <td>{{ transaction.debit_amount }}</td>
                <td>{{ transaction.ref1 }}</td>
                <td>{{ transaction.ref2 }}</td>
                <td>{{ transaction.ref3 }}</td>
                <td>{{ transaction.description }}</td>
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