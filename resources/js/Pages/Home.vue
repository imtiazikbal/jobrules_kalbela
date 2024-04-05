<script setup>
    import NavBar from '../Components/Header/Navbar.vue';
    import LeftSideBar_1 from '../Components/LeftSide/LeftSidebar_1.vue';
    import LeftSideBar_2 from '../Components/LeftSide/LeftSidebar_2.vue';

    import MainSection_1 from '../Components/MainSection/MainSection_1.vue';
    import MainSection_2 from '../Components/MainSection/MainSection_2.vue';
    import MainSection_3 from '../Components/MainSection/MainSection_3.vue';
    import MainSection_4 from '../Components/MainSection/MainSection_4.vue';

    import addSection_1 from '../Components/RightSide/AddSection_1.vue';
    import RightSection_1 from '../Components/RightSide/RightSection_1.vue';
    import FontendLayout from '@/Layouts/FontendLayout.vue';
    import SearchForm from '../Components/Search/Search.vue';

    defineProps({
        gov_job: Object,
       

    })
</script>
<template>
    <FontendLayout>
        <div class="container">
            <!-- <div class="container-fluid cbackgraund">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center py-3">
                                <a href=""><img src="https://tpc.googlesyndication.com/simgad/1409315922313000973"
                                        alt=""></a>
                            </div>
                        </div>
                    </div> -->


            <!-- <SearchForm/> -->

            <div class="row g-3 py-5">
                <div class="col-md-2  cbr-1">
                    <div class="row sidebarsection">

                        <LeftSideBar_1/>
                    </div>

                </div>
                <div class="col-md-7 col-sm-12 cbr-1 px-3">
                  
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="text-uppercase text-black py-1 text-1xl">ক্যাটাগরি বিভিন্ন সরকারি/বেসরকারি প্রতিষ্ঠানের আইন ও বিধি বিধান</h2>
                       <button> আরও</button>
                    </div>
                    <div class="row">
                        <MainSection_3 :gov_job="gov_job" />        
                    </div>


                </div>
                <div class="col-md-3">
                    <div class="row">
                        <addSection_1 />
                        <div class="col-md-12">
                            <RightSection_1 />
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </FontendLayout>

</template>

<style>
    @import url('https://fonts.maateen.me/solaiman-lipi/font.css');

    .container {
        max-width: 1280;
    }

    a,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    span {
        font-family: 'SolaimanLipi', sans-serif;

        padding: 0;
        margin: 0;
        text-decoration: none;

    }

    a {
        text-decoration: none;
        padding: 0 px;
        max-width: 0 px;
    }

    .cbr-1 {
        border-right: 2px solid #c4c4c4;

    }

    .cbr-2 {
        border-right: 1px solid #c4c4c4;

    }

    .cbt {

        border-top: 1px solid #a09e9e;
    }

    .headNews span a {
        font-size: 18px;
        font-weight: 600;
        text-decoration: none;

    }

    .headNews span span a {
        font-size: 18px;
        font-weight: 600;
        text-decoration: none;

    }

    .headNews {
        margin-bottom: 8px;
    }

    .headNews_body span a {
        color: #929292;
        text-decoration: none;

    }

    .mainText span a {
        font-size: 28px;
        font-weight: 600;
        text-decoration: none;
    }

    .mainImage span a {
        font-size: 12px;
        line-height: 2px;
        text-decoration: none;
    }

    .mainText h6 a {
        margin-top: 8px;
        font-size: 16px;
        text-decoration: none;
        color: #929292;

    }

    .mainText h6 {
        margin-top: 8px;
        font-size: 16px;
        text-decoration: none;
        color: #929292;

    }

    .mainText {
        padding-left: 5px;

    }

    .cheadTitle span a {
        text-decoration: none;
        color: red;
    }

    .mainSecond span a {

        font-size: 18px;
        font-weight: 600;
        text-decoration: none;
    }

    .col-4:last-child {
        border: none;
    }

    .col-6:last-child {
        border: none;
    }

    :root {
        --primary-heading: 20px;
        /* Example primary size */
        --primary-font-wight: 600;
        /* Example primary color */
        --primary-lineHieght: 30px;
        /* Example secondary color */
        --secondary-heading: 20px;
        /* Example secondary color */
        --secondary-color: #000000ad;
        /* Example secondary color */
        --font-size: 16px;
        /* Example font size */
        --border-right: 1px solid #e5e5e5af;
        /* Example border right */
        --padding-right: 10px;
        /* Example border right */
        /* Add more custom CSS variables as needed */
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        scroll-behavior: smooth;
        list-style: none;
        font-family: 'SolaimanLipi', sans-serif;

        text-decoration: none;
    }

    a {
        text-decoration: none;
        color: black;
    }

    a:hover {

        color: blue;
    }

    .CategoryName {
        padding-top: 10px;
        border-top: 4px solid #8c8787;
        margin-top: 50px;
    }

    span {
        font-size: small;
        padding: 0px 5px 0px 5px;
    }

    .adsBg {
        background-color: #F7F7F7;
        padding: 40px 0px 40px 0px;
    }

    .Category_content img {
        padding: 0px 10px 0px 0px;
    }

    .Category_content h2 {
        font-size: var(--primary-heading);
        line-height: var(--primary-lineHieght);
        margin-right: 10px;
        font-weight: var(--primary-font-wight);

    }

    .Category_content h3 {
        font-size: var(--secondary-heading);
        color: var(--secondary-color);
    }

    .br {
        border-right: var(--border-right);
        padding-right: var(--padding-right);
    }

    .bb {
        border-bottom: var(--border-right);
        padding-bottom: var(--padding-right);
    }

    .Cpr {
        padding-right: var(--padding-right);
    }

    .Cpb {
        padding-bottom: 20px;
    }

    .pr {
        padding-right: var(--padding-right);
    }

    .content_1 img {
        margin-right: 20px;
        padding-bottom: var(--padding-right);
    }

    .content_1 h2 {
        font-size: 20px;
        font-weight: var(--primary-font-wight);

    }

    .extraCategory_img img {
        width: 100%;
    }

    .extraCategory_content h2 {
        font-weight: var(--primary-font-wight);

        font-size: var(--primary-heading);
    }

    .extraCategory_content h3 {
        font-size: var(--secondary-heading);
        color: var(--secondary-color);

    }

    .row .col-md-3:last-child {
        border-right: none;
    }

    @media screen and (max-width: 768px) {
        .Category_content {
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-bottom: 20px;
        }

        .content_1 img {
            margin-right: 0px;
            padding-bottom: var(--padding-right);
        }

        .content_1 {
            display: flex;
            justify-content: space-between;
        }

        .Category_content img {
            width: 300px;
            height: 200px;
        }

        .newsSearch form {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
            margin-bottom: 20px;
        }

        .newsSearch form bg-transparent {
            padding-top: 50px;
        }

        .py {
            padding-bottom: 10px;
        }
    }

    .search_title h2 {
        font-size: var(--primary-heading);
        color: black;
    }

    .catBangladesh h2 {
        font-size: var(--primary-heading);
        font-weight: var(--primary-font-wight);
    }

    .catBangladesh h3 {
        font-size: var(--secondary-heading);
    }


    .col-md-5 .row>a:second-child {
        padding-top: 10px;
        /* Remove top padding for the first child element */
    }

    .col-md-5 .row>a:last-child {
        border-bottom: none;
        /* Remove bottom border for the last child element */
    }

    .row>a:last-child {
        padding-bottom: 0px;
    }

    .lastBorderRemove>a:last-child {
        border-bottom: none;
    }

    .lastBorderRemove>a:first-child {
        padding-top: 0px !important;
    }

    @media screen and (max-width: 768px) {
        .sidebarsection {
            display: none;
        }

        .mainsection{
            display: flex;
            flex-direction: column;
            
        }


    }
</style>
