<script setup>
    import {
        Link
    } from '@inertiajs/vue3';



</script>
<template>




        <div class="">
			<h4 class="p-2 bg-primary text-white">ক্যাটাগরি</h4>

            <ul class="nav-item p-0 pl-3" v-for="sub_category in $page.props.subCategory" :key="sub_category.id">
                
                <Link  :href="route('newsBySubCategory', { subcategory: sub_category.id })" class="nav-link border-bottom p-2 text-secondary">{{ sub_category.sub_category_name }}</Link>
            </ul>
        </div>




</template>

<style scoped>
.active {
  color: blue;
  background: #000;
}
    .headNews h2 {
        font-weight: 500;
        font-size: 16px;
    }
</style>
