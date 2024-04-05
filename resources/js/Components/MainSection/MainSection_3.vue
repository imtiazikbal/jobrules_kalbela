<script setup>
    import {
        Link
    } from '@inertiajs/vue3'


    defineProps({
        gov_job: Object
    })
</script>

<template>



    <Link class="col-md-3 col-12 d-block mt-3" v-for="gov_job in gov_job" :key="gov_job.id">
    <div class="mainSecond">
        <img :src="'/' + gov_job.image" width="100%">
        <h2 class="mt-3">{{ gov_job . title }}</h2>
    </div>
    </Link>


</template>

<style scoped>

</style>
