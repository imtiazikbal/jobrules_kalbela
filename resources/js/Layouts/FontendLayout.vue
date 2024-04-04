<script setup>


import NavBar from '../Components/Header/Navbar.vue';

import JobFooter from '@/Components/Footer/JobFooter.vue'
</script>



<template>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
    
<NavBar/>
   <slot />

 <JobFooter/>
  </div>
</template>
