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
    import Dropdown from 'primevue/dropdown';

    defineProps({
        category: Object,
        subcategory: Object,
        featured: Object,
        topic: Object

    })
    const form = useForm({
        title: null,
        nBody: null,
        nCaption: null,
        nTag: null,
        image: null,
        scroll: null,
        topic_id: null,
        category_id: null,
        sub_category_id: null,
        user_id: null,
        featured_id: null,
        division_id: null,
        district_id: null,
        upazila_id: null

    })
    const division = ref([]);
    const district = ref([]);
    const upazila = ref([]);

    const getDivision = () => {
        axios
            .get('/api/getDivision')
            .then((response) => {
                division.value = response.data;
            });
    };


    function getDistrict(e) {
        let selectedDivision = e.target.value
        axios
            .get('/api/getDistrict/' + selectedDivision)
            .then((response) => {
                district.value = response.data;
            });
    };

    function getUpazila(e) {
        let selectedDistrict = e.target.value
        axios
            .get('/api/getUpazila/' + selectedDistrict)
            .then((response) => {
                upazila.value = response.data;
            });
    };

    onMounted(() => {
        getDivision(),
            getDistrict(),
            getUpazila()
    });

    function submit() {
        router.post('/store/news', form)
    }

    const value = ref('<div>জব ডেসক্রিপশন এখানে লিখুন</div>');
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

    <Head title="News" />

    <AuthenticatedLayout>
        <template #header>
            News Creation
        </template>






        <main class="p-4 md:ml-64 h-auto pt-20">
            <div class="container mt-20">
                <div class="row">
                    <form action="" class="d-flex form_class">
                        <div class="col-md-8 mx-3">
                            <div class="row">
                                <div class="col-md-12 ">


                                    <input type="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Job Titile" required />
                                </div>
                                <div class="col-md-12 py-2">
                                   

                                    <Editor v-model="value" editorStyle="height:300px" />

                                </div>
                                <div class="col-md-12">

                                </div>
                            </div>


                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">

                                        <div class="relative">
                                            <input class="peer hidden" type="checkbox" name="select-1" id="select-1" />
                                            <label for="select-1"
                                                class="flex w-full cursor-pointer select-none rounded-lg border p-2 px-3 text-sm text-gray-700 ring-blue-400 peer-checked:ring">Select
                                                Category </label>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="pointer-events-none absolute right-0 top-3 ml-auto mr-5 h-4 text-gray-600 transition peer-checked:rotate-180"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                            <ul
                                                class="max-h-0 select-none flex-col overflow-hidden rounded-b-lg  peer-checked:max-h-56 peer-checked:py-3">
                                                <li
                                                    class="cursor-pointer px-3 py-2 text-sm text-gray-500 hover:bg-blue-500 hover:text-white">
                                                    Nikola Tesla</li>
                                                <li
                                                    class="cursor-pointer px-3 py-2 text-sm text-gray-500 hover:bg-blue-500 hover:text-white">
                                                    Lorem Ipsanum</li>
                                            </ul>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div
                                        class="sm:w-[32rem] shadow-blue-100 mx-auto my-10 overflow-hidden rounded-2xl bg-white  sm:max-w-lg">
                                        <div
                                            class="relative bg-blue-600 py-6 pl-8 text-xl font-semibold uppercase tracking-wider text-white">
                                            Upload Files

                                        </div>
                                        <div class="space-y-4 px-8 py-10">


                                            <div
                                                class="flex flex-col items-center justify-center rounded-lg border-4 border-dashed">
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
                                                    <label
                                                        class="shadow-blue-100 mt-2 block rounded-full border bg-white px-4 py-0.5 font-normal text-blue-500 shadow hover:bg-blue-50">
                                                        <input class="hidden" type="file" name="file"
                                                            id="" />
                                                        browse</label>
                                                </p>
                                            </div>

                                        </div>
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
