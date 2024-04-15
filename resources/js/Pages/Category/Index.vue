<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import Notification from '@/Components/Notification.vue';

// Define reactive variable for selected job type
const selectedJobType = ref('');
// Define reactive variable for categories
const categories = ref([]);

let props = defineProps({
  categories: Object
})
// Function to fetch categories based on job type
const fetchCategories = (e) => {
    axios.get(`/api/jobType/${selectedJobType.value}`)
         .then(response => {
         categories.value = response.data
          
         })
         
};
if(selectedJobType.value){
    fetchCategories();
}else{
  categories.value = props.categories
}
// Fetch categories when component is mounted
onMounted(() => {
    fetchCategories();
});
</script>

<template>
    <Head title="Category" />
    <AuthenticatedLayout>
        <template #header>
           All Category
        </template>
        <main class="p-4 md:ml-64 h-auto pt-20">
            <div v-if="$page.props.flash.success" class="absolute top-20 right-30 z-10">
                <Notification :message="$page.props.flash.success"/>
            </div>
            <div v-if="$page.props.flash.warning" class="absolute top-8 right-10 z-10">
                <Notification :message="$page.props.flash.warning"/>
            </div>
            <div class="flex items-center justify-start sm:justify-end"></div>
            <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
            <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
            <section class="relative py-16 bg-blueGray-50">
                <div class="w-full mb-12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-gray-900 text-white">
                        <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
                                    <h3 class="font-semibold text-lg text-white"></h3>
                                    <Link href="/categories/create" type="button" class="inline-flex cursor-pointer items-center rounded-lg border border-gray-400 bg-white py-2 px-3 text-center text-sm font-medium text-gray-800 shadow hover:bg-gray-100 focus:shadow">
                                        <svg class="mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" class=""></path>
                                        </svg>
                                        Create Category
                                    </Link>
                                </div>
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
                                    <select v-model="selectedJobType" @change="fetchCategories(e)" class="form-control" id="jobType">
                                        <option selected disabled value="">Select Job Type</option>
                                        <option value="1">Government</option>
                                        <option value="2">Non-Government</option>
                                        <option value="3">Law</option>
                                        <option value="4">Land</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div v-if="selectedJobType==''" class="block w-full overflow-x-auto ">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">Category</th>
                                        <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">Status</th>
                                        <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="category in props.categories" :key="category.id" class="align-middle ">
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{ category.cName }}</td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <i class="fas fa-circle text-orange-500 mr-2"></i> {{ category.status == 1 ? 'Active' : 'Inactive' }}
                                        </td>
                                        <td>
                                            <Link :href="`/category/edit/${category.id}`" class="btn btn-primary mr-2">Edit</Link>
                                            <Link :href="`/category/destroy/${category.id}`" class="btn btn-danger">Delete</Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-else class="block w-full overflow-x-auto ">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">Category</th>
                                        <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">Status</th>
                                        <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="category in categories" :key="category.id" class="align-middle ">
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{ category.title}}</td>
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <i class="fas fa-circle text-orange-500 mr-2"></i> {{ category.status == 1 ? 'Active' : 'Inactive' }}
                                        </td>
                                        <td>
                                            <Link :href="`/category/edit/${category.id}`" class="btn btn-primary mr-2">Edit</Link>
                                            <Link :href="`/category/destroy/${category.id}`" class="btn btn-danger">Delete</Link>
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
                                    Made By <a href="https://www.digitalsolutions.ltd/" class="text-blueGray-500 hover:text-gray-800" target="_blank">Digital Solutions Limited</a> .
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
