
<script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head } from '@inertiajs/vue3';
  import { Link } from '@inertiajs/vue3';
  
  import { reactive } from 'vue'
  import { router } from '@inertiajs/vue3'
  
  let props = defineProps({
    subCategory: Object,
    categories: Object
  })
  const form = reactive({
    sub_category_name: props.subCategory.sub_category_name,
    category_id: props.subCategory.category_id
  })
  
  function submit() {
    router.post('/subCategory/update/'+props.subCategory.id+'',form)
  }
  
  
  
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
          
      <!-- component -->
<!-- component -->
<div class="flex items-center justify-start sm:justify-end py-5">
        
  <div class="mb-4 px-2 w-full">
    <form @submit.prevent="submit">
            <div class="row py-5 gy-md-4 overflow-hidden">
              <div class="col-12">
                <label for="email" class="form-label">Category <span class="text-danger">*</span></label>
                <select class="form-control" v-model="form.category_id">
                    <option v-for="category in categories" :key="category.id" :value="category.id">{{category.cName}}</option>
                </select>
              </div>
              <div class="col-12">
                <label for="email" class="form-label">Sub Category <span class="text-danger">*</span></label>
                <input type="text" v-model="form.sub_category_name" id="input3" class="w-full border-green-500 border px-4 py-2 rounded focus:border focus:border-blue-500 focus:shadow-outline outline-none"  placeholder="Category..." />

              </div>
              <div class="col-12">
               
                  <button class="btn btn-primary text-black" type="submit">Add SubCategory</button>
                
              </div>
            </div>
          </form>
  <!-- <input id="input3" class="w-full border-green-500 border px-4 py-2 rounded focus:border focus:border-blue-500 focus:shadow-outline outline-none" type="text" placeholder="Category..." /> -->
</div>
       
      </div>



  </main>
  

    
       
    </AuthenticatedLayout>
</template>

<style>

</style>