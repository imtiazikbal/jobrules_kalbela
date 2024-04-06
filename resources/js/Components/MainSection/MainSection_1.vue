<script setup>
    import {
        Link
    } from '@inertiajs/vue3'


    defineProps({
        gov_non_gov_law: Object
    })
</script>

<template>

<!-- বিভিন্ন সরকারি/বেসরকারি প্রতিষ্ঠানের আইন ও বিধি বিধান -->

    <Link  :href="route('jobsByTitle', { job: job.id })" class="col-md-3 col-12 d-block mt-3" v-for="job in gov_non_gov_law" :key="job.id">
    <div class="mainSecond">
        <img :src="'/' + job.image" width="100%">
        <h2 class="mt-3">{{ job.title }}</h2>
    </div>
    </Link>


</template>

<style scoped>

</style>
