<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})
defineProps({
  tJobs: Object,
  tCategory: Object,
  tSubCategory: Object,
  
})
</script>

<template>
   
    <AuthenticatedLayout>
        
        <main class="p-4 md:ml-64 h-auto pt-20">
    <!-- This is an example component -->
<div class="py-5">
        <main class="h-full overflow-y-auto">
            <div class="container  mx-auto grid">
           
            
              <!-- Cards -->
              <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                  <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="h-8 w-8 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="5" r="2" />  <path d="M10 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4" /></svg>
                  </div>
                  <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                     Total Jobs
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                     {{tJobs}}
                    </p>
                  </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                  <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"/>
</svg>

                  </div>
                  <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                       Total Category
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                     {{ tCategory }}
                    </p>
                  </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                      <svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
</svg>

                      </div>
                  <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                      Total Sub-Category
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ tSubCategory }}
                    </p>
                  </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                 
                  <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                    <svg class="h-8 w-8 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="2" />  <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />  <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" /></svg>
                  </div>
                  <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total View
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                      35
                    </p>
                  </div>
                </div>
              </div>
  
            </div>
        </main>
    </div>
    <section>
      <footer class="relative pt-8 pb-6 mt-8">
      <div class="container mx-auto px-4">
        <div class="flex flex-wrap items-center md:justify-between justify-center">
          <div class="w-full md:w-6/12 px-4 mx-auto text-center">
            <div class="text-sm text-blueGray-500 font-semibold py-1">
              Made By <a href="https://www.digitalsolutions.ltd/" class="text-blueGray-500 hover:text-gray-800" target="_blank">Digital  Solutions Limited</a> .
            </div>
          </div>
        </div>
      </div>
    </footer>
    </section>
    </main>
    </AuthenticatedLayout>


</template>


