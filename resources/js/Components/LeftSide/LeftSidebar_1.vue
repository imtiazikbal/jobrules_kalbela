<script setup>
    import {
        Link
    } from '@inertiajs/vue3';


    defineProps({
        news: Object
    })
</script>
<template>




        <div class="">
			<h4 class="p-2 bg-primary text-white">Category</h4>

            <ul class="nav-item p-0 pl-3">
                <a href="#" class="nav-link border-bottom p-2 text-secondary">Category 1</a>
                <a href="#" class="nav-link border-bottom p-2 text-secondary">Category 1</a>
                <a href="#" class="nav-link border-bottom p-2 text-secondary">Category 1</a>
                <a href="#" class="nav-link border-bottom p-2 text-secondary">Category 1</a>
                <a href="#" class="nav-link border-bottom p-2 text-secondary">Category 1</a>
                <a href="#" class="nav-link border-bottom p-2 text-secondary">Category 1</a>
                <a href="#" class="nav-link border-bottom p-2 text-secondary">Category 1</a>
                <a href="#" class="nav-link border-bottom p-2 text-secondary">Category 1</a>
            </ul>
        </div>




</template>

<style scoped>
    .headNews h2 {
        font-weight: 500;
        font-size: 16px;
    }
</style>
