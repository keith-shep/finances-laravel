<template>
    <Head title="finances" />


    <div class="grid grid-cols-6 gap-4 ">
        <aside class="col-span-2">
            
            <Filters 
                :options="categories.data"
                :to="to"
                :from="from"
                :category_ids="category_ids"
            />
            <ImportCsv class="my-2" :bank_accounts="bank_accounts"/>
            

            <Button class="my-2" @click="router.post('/categorize')">categorize</Button>

            <Button class="my-2" @click="router.delete('/transactions')">reset entries</Button>

            <PieChart :data="pie_chart_data"/>
        </aside>

        <div class="col-span-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3 whitespace-nowrap">Transaction Date</th>
                        <th class="px-6 py-3">Bank Account</th>
                        <th class="px-6 py-3">Reference</th>
                        <th class="px-6 py-3">Debit Amount</th>
                        <th class="px-6 py-3">Credit Amount</th>
                        <th class="px-6 py-3">Category</th>
                        <th class="px-6 py-3">Ref1</th>
                        <th class="px-6 py-3">Ref2</th>
                        <th class="px-6 py-3">Ref3</th>
                        <th class="px-6 py-3">Description</th>
                    </tr>
                </thead>

                <template v-if="!transactions.length">
                    No data was found.
                </template>

                <tbody v-else>
                    <tr v-for="transaction in transactions" class="bg-white border-b">
                        <td class="px-6 py-3">{{ transaction.transaction_date }}</td>
                        <td class="px-6 py-3">{{ transaction.bank_account.name }}</td>
                        <td class="px-6 py-3">{{ transaction.reference }}</td>
                        <td class="px-6 py-3">{{ transaction.debit_amount }}</td>
                        <td class="px-6 py-3">{{ transaction.credit_amount }}</td>
                        <!-- <td class="px-6 py-3">{{ transaction.category }}</td> -->
                        <td class="px-6 py-3"><Dropdown :options="categories.data" :transaction_id="transaction.id" :selected_category_id="transaction.category_id"/></td>
                        
                        <td class="px-6 py-3">{{ transaction.ref1 }}</td>
                        <td class="px-6 py-3">{{ transaction.ref2 }}</td>
                        <td class="px-6 py-3">{{ transaction.ref3 }}</td>
                        <td class="px-6 py-3">{{ transaction.description }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
import { Head, useForm } from '@inertiajs/vue3'
import { reactive, computed } from 'vue'
import ImportCsv from '../../Components/ImportCsv.vue';
import PieChart from '../../Components/PieChart.vue';
import Dropdown from '../../Components/Dropdown.vue';
import Filters from '../../Components/Filters.vue';
import Button from '../../Components/Button.vue';

const props = defineProps({ 
  user: Object,
  transactions: Array,
  from: String,
  to: String,
  pie_chart_data: Object,
  categories: Object,
  category_ids: Array,
  bank_accounts: Array,
})

</script>