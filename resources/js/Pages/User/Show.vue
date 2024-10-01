<template>
  <!-- <Layout> -->
    <Head title="finances" />
    <!-- <h1>Welcome</h1> -->
    <!-- <p>Hello {{ user.name }}, welcome to your first Inertia app!</p> -->

    <table>
        <thead>
            <tr>
                <th>Transaction Date</th>
                <th>Amount</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>29 Sept 2024</td>
                <td>200</td>
                <td>Test</td>
            </tr>
            <tr>
                <td>29 Sept 2024</td>
                <td>5</td>
                <td>NTUC</td>
            </tr>
        </tbody>
    </table>
  <!-- </Layout> -->
</template>

<script setup>
// import Layout from './Layout'
import { Head } from '@inertiajs/vue3'

defineProps({ user: Object })
</script>