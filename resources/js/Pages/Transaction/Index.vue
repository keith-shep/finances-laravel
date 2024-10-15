<template>
    <Head title="finances" />


    <div class="grid grid-cols-6 gap-4 ">
        <aside class="col-span-2">
            <form @submit.prevent="form.get('/finances')">
                <label class="block" for="start">Start date:</label>
                <input type="month" id="start" name="from" v-model="form.from" min="2024-01" max="2024-12" />
                
                <label class="block" for="end">End date:</label>
                <input type="month" id="end" name="to" v-model="form.to" min="2024-01" max="2024-12" />

                <!-- submit -->
                <button class="block bg-blue-500 text-white rounded-full py-2 px-4" type="submit" :disabled="form.processing">Filter</button>
            </form>

            <ImportCsv/>

            <PieChart :data="pie_chart_data"/>
        </aside>

        <div class="col-span-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Transaction Date</th>
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

                <template v-if="!transformedData.length">
                    No data was found.
                </template>

                <tbody v-else>
                    <tr v-for="transaction in transformedData" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" >
                        <td class="px-6 py-3">{{ transaction.transaction_date }}</td>
                        <td class="px-6 py-3">{{ transaction.reference }}</td>
                        <td class="px-6 py-3">{{ transaction.debit_amount }}</td>
                        <td class="px-6 py-3">{{ transaction.credit_amount }}</td>
                        <!-- <td class="px-6 py-3">{{ transaction.category }}</td> -->
                        <td class="px-6 py-3"><Dropdown :options="categories.data"/></td>
                        
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
import { Head, useForm } from '@inertiajs/vue3'
import { reactive, computed } from 'vue'
import ImportCsv from '../../Components/ImportCsv.vue';
import PieChart from '../../Components/PieChart.vue';
import Dropdown from '../../Components/Dropdown.vue';

const props = defineProps({ 
  user: Object,
  transactions: Array,
  from: String,
  to: String,
  pie_chart_data: Object,
  categories: Array,
})

const transformedData = computed(() => {
    return props.transactions;
})

const pieChartData = computed(() => {

    // console.log(props.pie_chart_data);
    // const data = ref({
    //     labels: ['January', 'February', 'March'],
    //     datasets: [{ data: [40, 20, 12] }]
    // })
    // return props.transactions;
})


const form = useForm({  
    from: props.from,
    to: props.to,
})


</script>