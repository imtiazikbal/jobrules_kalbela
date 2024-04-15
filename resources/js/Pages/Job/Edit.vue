<script setup>
    import {
        ref
    } from "vue";

    import {
        useForm
    } from '@inertiajs/vue3'
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import {
        Head
    } from '@inertiajs/vue3';
    import {
        router
    } from '@inertiajs/vue3'
    import {

        onMounted
    } from 'vue'


    import Editor from 'primevue/editor';

    import axios from 'axios';


    let props = defineProps({
        jobs: Object,
        sub_category: Object,
        category: Object,
        job_position: Object,
        jobs: Object



    })
const custoImage = props.jobs.image;
    const form = useForm({
        title: props.jobs.title,
        des: props.jobs.des,
        image: null,
        scroll: props.jobs.scroll,
        job_link: props.jobs.job_link,
        video_link: props.jobs.video_link,
        category_id: props.jobs.category_id,
        sub_category_id: props.jobs.sub_category_id,
        job_position_id: props.jobs.job_position_id,
        status: props.jobs.status,
        tag: [],
    




    })

    const previewImageUrl = ref('');

    const handleFileInputChange = (event) => {
        const file = event.target.files[0];
        if (file) {
            form.image = file; // Update the form's image value
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImageUrl.value = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            previewImageUrl.value = props.jobs.image
        }
    };
    const sub_categoryFromApi = ref([]);

    const categoryFormApi = ref([]);



    // const category = () => {
    //     axios
    //         .get('/api/getCategory')
    //         .then((response) => {
    //             categoryFormApi.value = response.data;
    //         });
    // };

    const subCategory = (e) => {
        let selectedCategory; // Declare selectedCategory outside the if block
        if (e && e.target) {
            selectedCategory = e.target.value; // Assign value inside the if block
        } else {
            selectedCategory = props.jobs.category_id
        }
        axios
            .get('/api/getSubCategory/' + selectedCategory)
            .then((response) => {
                sub_categoryFromApi.value = response.data;
            });
    };
    // const subCategory = (e) => {
    //     let selectedCategory; // Declare selectedCategory outside the if block
    //     if (e && e.target) {
    //         selectedCategory = e.target.value; // Assign value inside the if block
    //     }
    //     axios
    //         .get('/api/getSubCategory/' + selectedCategory)
    //         .then((response) => {
    //             sub_categoryFromApi.value = response.data;
    //         });
    // };







    onMounted(() => {
        // category(),
        subCategory()

    });

    function submit() {
        router.post('/update/job/' + props.jobs.id + '', form)
    }

    const value = ref('<div>জব ডেসক্রিপশন এখানে লিখুন</div>');

    
   

    const tags = ref([]);
    if(props.jobs.tag){
        props.jobs.tag = props.jobs.tag.split(',')

        tags.value = props.jobs.tag
    }


    const addTag = (event) => {
  event.preventDefault();
  let val = event.target.value.trim();
  if (val.length > 0) {
    if (tags.value.length >= 1) {
      for (let i = 0; i < tags.value.length; i++) {
        if (tags.value[i] === val) {
          return false;
        }
      }
    }
    tags.value.push(val);
    event.target.value = '';
   form.tag = tags.value
  }
};

const removeTag = (index) => {
  tags.value.splice(index, 1);
};

const removeLastTag = (event) => {
  if (event.target.value.length === 0) {
    removeTag(tags.value.length - 1);
  }
};

</script>


<style>
    element {
        width: 300px;
        height: 300px;
    }

    @media screen and (max-width: 768px) {
        .form_class {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    }
</style>
<template>

    <Head title="Jobs" />

    <AuthenticatedLayout>
        <template #header>
            Jobs Creation
        </template>






        <main class="p-4 md:ml-64 h-auto pt-20">
            <div class="container mt-20">
                <div class="row">

                    <form @submit.prevent="submit" class="d-flex form_class">
                        <div class="col-md-8 mx-3">
                            <div class="row">
                                <div class="col-md-12 ">


                                    <input type="text" id="text" v-model="form.title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Job Titile" required />
                                </div>
                                <div class="col-md-12 py-2">


                                    <Editor v-model="form.des" editorStyle="height:415px" required />

                                </div>
                                <div class="col-md-12 ">

                                    <label for="">Video link(Optional)</label>

                                    <input type="texy" id="text" v-model="form.video_link"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Job Video Link(Optional)" />
                                </div>
                                <div class="col-md-12 mt-3 ">
                                    <label for="">Job link(Optional)</label>



                                    <input type="texy" id="text" v-model="form.job_link"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Job Link(Optional)" />
                                </div>
                                <div class="col-md-12 mt-3 ">
                                    <label for="">Job Tag</label>
                                    
                                    <div class="container">
    <div class='tag-input'>
      <div v-for='(tag, index) in tags' :key='tag' class='tag-input__tag'>
        {{ tag }}
        <span @click='removeTag(index)'>x</span>
      </div>
      <input
        type='text'
        placeholder="Enter a Tag"
        class='tag-input__text'
        @keydown.enter='addTag'
        @keydown.188='addTag'
        @keydown.delete='removeLastTag'
        v-model="form.tag"
      />
    </div>
   
  </div>
                                </div>



                            </div>


                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12 px-2">
                                    <div class="category">
                                        <label for=""
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                        <select v-model="form.category_id" @change="(e) => subCategory(e)"
                                            class="form-select rounded-pill mb-3" aria-label="Default select example"
                                            required>


                                            <option v-for="category in category" :key="category.id"
                                                :value="category.id">{{ category . cName }}</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-12 px-2">
                                    <div class="category">
                                        <label for=""
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub
                                            Category</label>

                                        <select v-model="form.sub_category_id"
                                            class="form-control form-select bg-gray-50 border-gray-300 mt-3">

                                            <option v-for="sub_category in sub_categoryFromApi" :key="sub_category.id"
                                                :value="sub_category.id">{{ sub_category . sub_category_name }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 px-2">
                                    <div class="category">
                                        <label for=""
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                                            Type</label>

                                        <select name="" id="" v-model="form.job_position_id" required
                                            class="form-control form-select bg-gray-50 border-gray-300 mt-3">

                                            <option v-for="jobtype in job_position" :key="jobtype.id"
                                                :value="jobtype.id">{{ jobtype . position_name }}</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 px-2">
                                    <div class="category">
                                        <label for=""
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                                            Scroll</label>

                                        <select name="" id="" v-model="form.scroll"
                                            class="form-control form-select bg-gray-50 border-gray-300 mt-3">

                                            <option value="1">Yes</option>
                                            <option value="0">No</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-12 px-2">
                                    <div class="category">
                                        <label for=""
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                                            Status</label>

                                        <select name="" id="" v-model="form.status"
                                            class="form-control form-select bg-gray-50 border-gray-300 mt-3">

                                            <option value="1">Active</option>
                                            <option value="0">Un Active</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div
                                        class="sm:w-[32rem] shadow-blue-100 mx-auto my-3 overflow-hidden rounded-2xl bg-white  sm:max-w-lg">
                                        <div
                                            class="relative bg-blue-600 py-6 pl-8 text-xl font-semibold uppercase tracking-wider text-white">
                                            Job Image

                                        </div>
                                        <div class="space-y-4 px-8 py-10">


                                            <div class="flex flex-col items-center  rounded-lg border-4 border-dashed">
                                                <svg class="h-14 -rotate-90" version="1.1" id="Layer_1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 512 512" enable-background="new 0 0 512 512"
                                                    xml:space="preserve">
                                                    <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse"
                                                        x1="326.4185" y1="382.5204" x2="326.4185" y2="128.8734"
                                                        class="gradient-element">
                                                        <stop offset="0" class="primary-color-gradient"
                                                            style="stop-color: #ABDCFF"></stop>
                                                        <stop offset="1" class="secondary-color-gradient"
                                                            style="stop-color: #0396FF"></stop>
                                                    </linearGradient>
                                                    <path fill="url(#SVGID_1_)"
                                                        d="M466.1,249.8l-122-122c-4.6-4.6-12.4-1.3-12.4,5.1v95.2c0,29.3-23.8,53.1-53.1,53.1H193	c-4.9,0-8.8,4-8.8,8.8v16.8c0,4.8,3.9,8.7,8.7,8.7h91.7c4.8,0,8.7,3.9,8.7,8.7v89.6c0,7.8,9.4,11.6,14.9,6.2l157.9-157.9	C469.5,258.8,469.5,253.2,466.1,249.8z">
                                                    </path>
                                                    <path
                                                        d="M302,430.6c-2.2,0-4.3-0.4-6.4-1.3c-6.3-2.6-10.3-8.7-10.3-15.4v-89.6c0-0.4-0.3-0.7-0.7-0.7H123.1	c-9.2,0-16.7-7.5-16.7-16.7v-25.7c0-4.4,3.6-8,8-8s8,3.6,8,8v25.7c0,0.4,0.3,0.7,0.7,0.7h161.5c9.2,0,16.7,7.5,16.7,16.7v89.6	c0,0.2,0,0.5,0.4,0.7c0.4,0.2,0.6,0,0.8-0.2l157.9-157.9c0.3-0.3,0.3-0.7,0-1L302.5,97.6c-0.1-0.1-0.3-0.3-0.8-0.2	c-0.4,0.2-0.4,0.5-0.4,0.7v89.6c0,9.2-7.5,16.7-16.7,16.7h-197c-4.4,0-8-3.6-8-8s3.6-8,8-8h197c0.4,0,0.7-0.3,0.7-0.7V98.1	c0-6.8,4-12.8,10.3-15.4c6.3-2.6,13.4-1.2,18.2,3.6l157.9,157.9c6.5,6.5,6.5,17.1,0,23.6L313.8,425.7	C310.6,428.9,306.4,430.6,302,430.6z">
                                                    </path>
                                                    <path fill="#0396FF" class="secondary-color"
                                                        d="M29.6,128.1V25.5h21.8v102.6H29.6z M51.4,249V146.4H29.6V249H51.4z">
                                                    </path>
                                                    <path fill="#ABDCFF" class="primary-color"
                                                        d="M484.2,374.2v102.6h-91.4L484.2,374.2z"></path>
                                                    <path
                                                        d="M35.4,281.3c0-4.4,3.6-8,8-8h112.8c4.4,0,8,3.6,8,8s-3.6,8-8,8H43.4C38.9,289.3,35.4,285.7,35.4,281.3z M235.4,372.2	c4.4,0,8-3.6,8-8s-3.6-8-8-8H43.4c-4.4,0-8,3.6-8,8s3.6,8,8,8H235.4z M417.3,45.3c-4.4,0-8,3.6-8,8c0,11.4-9.3,20.8-20.8,20.8	c-4.4,0-8,3.6-8,8s3.6,8,8,8c20.3,0,36.8-16.5,36.8-36.8C425.3,48.8,421.7,45.3,417.3,45.3z M467.3,90c4.4,0,8-3.6,8-8s-3.6-8-8-8	c-11.4,0-20.8-9.3-20.8-20.8c0-4.4-3.6-8-8-8s-8,3.6-8,8C430.5,73.5,447,90,467.3,90z M467.3,95.3c-20.3,0-36.8,16.5-36.8,36.8	c0,4.4,3.6,8,8,8s8-3.6,8-8c0-11.4,9.3-20.8,20.8-20.8c4.4,0,8-3.6,8-8S471.7,95.3,467.3,95.3z M388.5,95.3c-4.4,0-8,3.6-8,8	s3.6,8,8,8c11.4,0,20.8,9.3,20.8,20.8c0,4.4,3.6,8,8,8s8-3.6,8-8C425.3,111.7,408.8,95.3,388.5,95.3z M132.4,105.4c0,4.4,3.6,8,8,8	h112.8c4.4,0,8-3.6,8-8s-3.6-8-8-8H140.4C136,97.4,132.4,101,132.4,105.4z M261.2,154c0,5-4.1,9-9,9s-9-4.1-9-9s4.1-9,9-9	S261.2,149.1,261.2,154z M222.2,145c5,0,9,4.1,9,9s-4.1,9-9,9s-9-4.1-9-9S217.2,145,222.2,145z M192.2,145c5,0,9,4.1,9,9s-4.1,9-9,9	s-9-4.1-9-9S187.2,145,192.2,145z M95,452.9c0,14.6-11.8,26.4-26.4,26.4s-26.4-11.8-26.4-26.4s11.8-26.4,26.4-26.4	S95,438.3,95,452.9z M79,452.9c0-5.7-4.7-10.4-10.4-10.4s-10.4,4.7-10.4,10.4s4.7,10.4,10.4,10.4S79,458.6,79,452.9z M353.7,459.9	H240.8c-4.4,0-8,3.6-8,8s3.6,8,8,8h112.8c4.4,0,8-3.6,8-8S358.1,459.9,353.7,459.9z M92.7,52.1h112.8c4.4,0,8-3.6,8-8s-3.6-8-8-8	H92.7c-4.4,0-8,3.6-8,8S88.2,52.1,92.7,52.1z">
                                                    </path>
                                                </svg>

                                                <p class="mt-4 text-center text-xl font-medium text-gray-800">
                                                    Drop Files here or
                                                    <!-- <label
                                                        class="shadow-blue-100 mt-2 block rounded-full border bg-white px-4 py-0.5 font-normal text-blue-500 shadow hover:bg-blue-50">
                                                        <input @input="form.image = $event.target.files[0]" class="hidden" type="file" name="file"
                                                            id="" required />
                                                        browse</label> -->
                                                <div class="mt-3">

                                                    <label
                                                        class="shadow-blue-100 mb-2 mt-2 block rounded-full border bg-white px-4 py-0.5 font-normal text-blue-500 shadow hover:bg-blue-50">
                                                        <input @change="handleFileInputChange" class="hidden"
                                                            type="file" name="file" id=""/>
                                                        Browse
                                                    </label>
                                                    <img :src="previewImageUrl" v-if="previewImageUrl"
                                                        alt="Preview Image" width="100%">
                                                        <img :src="'/' +custoImage" v-else alt="Preview Image" width="100%">
                                                </div>
                                                </p>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 ">


                                    <div class="d-grid py-2">
                                        <button class="btn btn-primary text-black" type="submit">Update Job</button>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>





    </AuthenticatedLayout>

</template>
<style scoped>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400&display=swap');
      
     
      a {
      position: absolute;
      right: 15px;
      bottom: 15px;
      font-weight: bold;
      text-decoration: none;
      color: #00003a;
      font-size: 20px;
    }
      
      
    /*tag input style*/
      
      .tag-input {
        width: 50%;
        border: 1px solid #D9DFE7;
        background: #fff;
        border-radius: 4px;
        font-size: 0.9em;
        min-height: 45px;
        box-sizing: border-box;
        padding: 0 10px;
        font-family: "Roboto";
        margin-bottom: 10px;
      }
    
      .tag-input__tag {
        height: 24px;
        color: white;
        float: left;
        font-size: 14px;
        margin-right: 10px;
        background-color: #667EEA;
        border-radius: 15px;
        margin-top: 10px;
        line-height: 24px;
        padding: 0 8px;
        font-family: "Roboto";
      }
    
      .tag-input__tag > span {
        cursor: pointer;
        opacity: 0.75;
        display: inline-block;
        margin-left: 8px;
      }
    
      .tag-input__text {
        border: none;
        outline: none;
        font-size: 1em;
      line-height: 40px;
      background: none;
      }
      element {
        width: 300px;
        height: 300px;
    }

    @media screen and (max-width: 768px) {
        .form_class {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    }
</style>