<script setup>
   import { Link } from '@inertiajs/vue3'
    import NavBar from '../Components/Header/Navbar.vue';
    import FontendLayout from '@/Layouts/FontendLayout.vue';
    import LeftSideBar_1 from '../Components/LeftSide/LeftSidebar_1.vue';

    defineProps({
        jobs: Object,
        catName: String
    })
</script>
<template>
    <FontendLayout>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-2  cbr-1">
                    <div class="row sidebarsection">

                        <LeftSideBar_1 />
                    </div>

                </div>
                <div class="col-md-8 col-sm-12 cbr-1 px-3">


                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center">
                           <div>
                            <h2 class="text-uppercase text-black py-1 text-2xl font-bold bb1">{{ catName.cName }}</h2>
                           </div>
                            <button>
                                <Link href="https://tpc.googlesyndication.com/simgad/1409315922313000973">আরও</Link>
                            </button>
                        </div>
                        <Link :href="route('jobsByTitle', { job: job.id })" class="col-md-3 col-12 d-block mt-3 py-3"
                            v-for="job in jobs" :key="job.id">
                        <div class="mainSecond">
                            <img :src="'/' + job.image" width="100%">
                            <h2 class="mt-3">{{ job . title }}</h2>
                        </div>
                        </Link>


                    </div>
                    <div class="row">
                        <div class="col-12 py-3">
                            <a href=""><img src="https://tpc.googlesyndication.com/simgad/1409315922313000973"
                                    alt=""></a>
                        </div>
                    </div>








                </div>
                <div class="col-md-2 d-flex flex-column align-items-center position-sticky top-0">
                    <div class="detailsSideBar">
                        <div class="detailsAdd1">
                            <img src="https://tpc.googlesyndication.com/simgad/18288574991889935630" alt="">
                        </div>
                        <div class="detailsAdd2 pt-3">
                            <img src="https://tpc.googlesyndication.com/simgad/18288574991889935630" alt="">
                        </div>
                    </div>



                    <!-- <Link class="relatedNew pt-3" v-for="news1 in relatedNews.news" :key="news1.id"
                        :href="route('newsByTitle', { news: news1.id })">

                    <h2>{{ news1 . title }}</h2>
                    <div class="relDesPic d-flex justify-content-between py-1">
                        <h2 v-html="news1.nBody.substr(0, 50)">
                        </h2>

                        <img :src="'/' + news1.image" alt="" width="30%">

                    </div>
                    </Link> -->
                    <div class="detailsSideBar py-2">
                        <div class="detailsAdd1">
                            <img src="https://tpc.googlesyndication.com/simgad/18288574991889935630" alt="">
                        </div>

                    </div>


                </div>
            </div>







        </div>
    </FontendLayout>
</template>

<style scoped>
.bb1{
    border-bottom: 4px solid #ffae00;
    margin-bottom: 10px;
}
    .btnStyle555 {
        color: white;

        font-size: 20px;
        font-weight: 600;
        padding: 10px 0px;
        border-radius: 12px;
        margin-bottom: 10px;
        background-color: #3A495E;
        transition: 0.3s ease-in;
    }

    .btnStyle555:hover {
        background-color: #eee;
    }
</style>
