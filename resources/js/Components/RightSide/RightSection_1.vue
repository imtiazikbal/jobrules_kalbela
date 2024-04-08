<template>
  <div class="w-full">
    <nav class="border-b text-sm flex justify-start">
      <!-- Active class will be applied to Popular link when activeTab is 'popular' -->
      <a class="inline-block px-4 py-2 border-b-2 border-indigo-600 text-indigo-600 font-semibold" :class="{ 'bg-gray-200': activeTab === 'popular' }" @click="changeTab('popular')" href="#">জনপ্রিয়</a>
  
      <!-- Active class will be applied to Latest link when activeTab is 'latest' -->
      <a class="inline-block px-4 py-2 text-gray-700 hover:text-black" :class="{ 'bg-gray-200': activeTab === 'latest' }" @click="changeTab('latest')" href="#">সর্বশেষ</a>
    </nav>

    <!-- Display demo data based on the activeTab value -->
    <div v-if="activeTab === 'popular'">
      <!-- Demo data for Popular -->
  
        <!-- <p>{{ post.sub_category_name }}</p> -->
        <ul class="nav-item p-0 pl-3"  v-for="post in popularPosts" :key="post.id">
                
                <Link  class="nav-link border-bottom p-2 text-secondary">{{  post.sub_category_name}}</Link>
            </ul>
 
    </div>
    <div v-else-if="activeTab === 'latest'">
      <!-- Demo data for Latest -->
      
        <ul class="nav-item p-0 pl-3" v-for="post in latestPosts" :key="post.id">
                
                <Link  class="nav-link border-bottom p-2 text-secondary">{{ post.cName }}</Link>
            </ul>
     
    </div>
  </div>
</template>

<script setup>


import { ref, onMounted } from 'vue';
  import axios from 'axios';
  
  const latestPosts = ref([]);
  const popularPosts = ref([]);

  
  const fetchLatestPosts = async () => {
    try {
      const response = await axios.get('/api/getCategory');
      latestPosts.value = response.data;
    } catch (error) {
      console.error('Error fetching latest posts:', error);
    }
  };
  
  const fetchPopularPosts = async () => {
    activeTab.value = 'popular'; // Set active tab to 'popular'
    try {
      const response = await axios.get('/api/getSubCategory');
      popularPosts.value = response.data;
    } catch (error) {
      console.error('Error fetching popular posts:', error);
    }
  };
 
  onMounted(() => {
    fetchPopularPosts();
    fetchLatestPosts();
   
  });
  
    // Set up a reactive variable to track the active tab
    const activeTab = ref('popular');

    // Method to change the active tab
    const changeTab = (tab) => {
      activeTab.value = tab;
    };

    

</script>
