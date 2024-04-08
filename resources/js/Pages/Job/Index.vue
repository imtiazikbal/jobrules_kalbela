
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import Notification from '@/Components/Notification.vue';

defineProps({
  jobs: Object
})

// const form = reactive({
//   image_path :  '',
//   id :  '',
// })
// const submit = () => {
//   let id = form.id;
//   if (confirm('Are you sure you want to delete this news?')) {
//     router.post('destroy/news/'+id, form)
//   }
// }

</script>

<template>
    <Head title="All News" />

    <AuthenticatedLayout>
        <template #header>
           All News
           
        </template>
    <main class="p-4 md:ml-64 h-auto pt-20">
      <div v-if="$page.props.flash.success" class="absolute top-20 right-30 z-10">
           <Notification :message="$page.props.flash.success"/>
           </div>

           <div v-if="$page.props.flash.warning" class="absolute top-8 right-10 z-10">
            <Notification :message="$page.props.flash.warning"/>
           </div>
          
      <!-- component -->
<!-- component -->
<div class="flex items-center justify-start sm:justify-end">
        

       
      </div>
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
<section class="relative py-16 bg-blueGray-50">
<div class="w-full mb-12 px-4">
  <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded 
  bg-gray-900 text-white">
    <div class="rounded-t mb-0 px-4 py-3 border-0">
      <div class="flex flex-wrap items-center">
        <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
          <h3 class="font-semibold text-lg text-white">Job</h3>
          <Link   :href="route('create.job')" type="button" class="inline-flex cursor-pointer items-center rounded-lg border border-gray-400 bg-white py-2 px-3 text-center text-sm font-medium text-gray-800 shadow hover:bg-gray-100 focus:shadow">
          <svg class="mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" class=""></path>
          </svg>
Add Job
        </Link>
        </div>
      </div>
    </div>
    <div class="block w-full overflow-x-auto ">
      <table class="items-center w-full bg-transparent border-collapse">
        <thead>
          <tr>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">Image</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">Titile</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">Body</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">Category</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">Type</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">Status</th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">Action </th>
            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700"></th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="job in jobs" :key="job.id">
            <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
              <img :src="'/'+job.image" class="h-12 w-12 bg-white rounded-full border" alt="..."></th>
            
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{ job.title }}</td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"  v-html="job.des.substr(0, 50)"></td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{ job.category.cName }}</td>
            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{ job.job_position.position_name }}</td>
          

            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
              <i class="fas fa-circle text-orange-500 mr-2"></i> {{ job.status==1?'Published':'Unpublished' }}</td>
           
            <td>
              <Link  :href="`/edit/job/${job.id}`" class="btn btn-primary mr-2">Edit</Link>
              <Link  :href="`/destroy/job/${job.id}`" class="btn btn-danger">Delete</Link>

            </td>
          
          </tr>

     
        </tbody>
      </table>
    </div>
  </div>
</div>
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

<style>

</style>