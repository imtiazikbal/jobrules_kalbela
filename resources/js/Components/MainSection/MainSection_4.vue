<script setup>
    import {
        Link
    } from '@inertiajs/vue3'


    defineProps({
        pc_tips: Object
    })
</script>

<template>
<!-- কম্পিউটার (পিসি) হেল্প ও বিভিন্ন টিপস -->


    <Link :href="route('jobsByTitle', { job: job.id })" class="col-md-3 col-12 d-block mt-3" v-for="job in pc_tips" :key="job.id">
    <div class="mainSecond">
        <img :src="'/' + job.image" width="100%">
        <h2 class="mt-3">{{ job . title }}</h2>
    </div>
    </Link>

job
</template>

<style scoped>

</style>
