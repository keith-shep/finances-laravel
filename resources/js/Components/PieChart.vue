<template>
    <Pie :data="data" :options="options" />
</template>

<script setup lang="ts">
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'

import { Pie } from 'vue-chartjs'
import { ref } from 'vue'
ChartJS.register(ArcElement, Tooltip, Legend)


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