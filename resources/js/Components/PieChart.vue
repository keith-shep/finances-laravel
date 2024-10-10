<template>
    <Bar :data="data" :options="options" />
</template>

<script setup lang="ts">
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
} from 'chart.js'

import { Bar } from 'vue-chartjs'
import { ref } from 'vue'
ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend)


const props = defineProps({ 
    data: Object,
    // options: Object
})


// const data = ref({
//     labels: ['January', 'February', 'March'],
//     datasets: [{ data: [40, 20, 12] }]
// })

const options = ref({
    responsive: true
})        

</script>