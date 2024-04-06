<template>
    <div class="row">
      <div class="col animated fadeInUp">
        <nav class="nav nav-tabs nav-fill mb-3" id="nav-tab" role="tablist">
          <button @click="activeTab = 'latest'" class="nav-item nav-link" :class="{ 'active': activeTab === 'latest' }">
            <h4> <strong>Latest</strong> </h4>
          </button>
          <button @click="fetchPopularPosts()" class="nav-item nav-link" :class="{ 'active': activeTab === 'popular' }"> 
            <h4> <strong>Popular</strong> </h4> 
          </button>
        </nav>
      </div>
    </div>
  
    <div class="row">
      <div class="col">
        <div class="tab-content" id="nav-tabContent">
          <div v-if="activeTab === 'latest'" class="tab-pane fade show active animated fadeInUp" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
              <div v-for="post in latestPosts" :key="post.id" class="col-12">
                <h3 class="py-1">{{ post.cName }}</h3>
                <!-- Display other details of the latest post -->
              </div>
            </div>
          </div>
          <div v-else class="tab-pane fade animated fadeInUp" role="tabpanel" aria-labelledby="nav-popular">
            <div class="row">
              <div v-for="post in popularPosts" :key="post.id" class="col-12">
                <h3>{{ post.sub_category_name }}</h3>
                <!-- Display other details of the popular post -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  
  const latestPosts = ref([]);
  const popularPosts = ref([]);
  const activeTab = ref('latest'); // Initially set to 'latest'
  
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
    fetchLatestPosts();
   
  });
  
  </script>
  
  <style>
  /* Add your custom styles here */
  </style>
  