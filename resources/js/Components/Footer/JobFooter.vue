<script setup>
    import {
        Link
    } from '@inertiajs/vue3';
</script>

<template>
    <section class="py-1 " style="background-color: #353535">
        <div class="container text-white">
            <div class="row">
                <div class="col styleFollowUs">

                    <h5 class="text-center text-uppercase pb-4"><strong>Follow Us</strong></h5>
                    <div class="social-buttons text-center">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>


            <div class="row" style="padding-bottom: 45px;">
                <div class="col text-center" style="color:#d2d2d2;">
                    <hr>
                    <p> Email: news@jobsruls.com
                        <br> © 2022 সর্বস্বত্ব সংরক্ষিত || JobsRuls.com
                        <br> <br>
                    </p>
                    <h6 class="pt-4 border-top"> Develop by _ <a class="text-light"
                            href="https://digitalsolutions.ltd/">DigitalSolutions.Ltd</a> </h6>
                </div>
            </div>

        </div>
       
    </section>
    <div class="fixed-bottom py-3" style="background:#343A40;">
            <div class="row">
                <div class="col">
                    <marquee direction="left" speed="normal" scrollamount="5" behavior="scroll"
                        onmouseover="this.stop();" onmouseout="this.start();">
                        <a href="" class="text-white pr-3 text-decoration-none">
                            <span class="scrlstyle d-flex align-items-center">
                                <img class="mr-2" src="http://127.0.0.1:8000/uploads/news/news-1712048055-prothomalo-bangla_2024-04_7bdefc6d-55f0-46b4-b757-7e099653d4b1_moon.webp"
                                    style="width:45px; height:auto; border-radius: 10%; text-decoration: none;"
                                    alt="শিরোনাম" title="শিরোনাম">
                                পাকিস্তানের আবহাওয়া দপ্তর (পিএমডি) গতকাল সোমবার বলেছে, ৯ এপ্রিল পবিত্র শাওয়াল মাসের চাঁদ
                                দেখা যাওয়ার সম্ভাবনা বেশি। সে ক্ষেত্রে ১০ এপ্রিল পবিত্র ঈদুল ফিতর উদ্‌যাপনের সম্ভাবনা
                                রয়েছে।আবহাওয়া অফিস বলেছে, ৮ এপ্রিল রাত ১১টা ২১ মিনিটে নতুন চাঁদের ‘জন্ম’ হবে। পরদিন ৯
                                এপ্রিল সন্ধ্যায় এটির বয়স হবে ১৯ থেকে ২০ ঘণ্টা। সেদিন সূর্যাস্তের পর ৫০ মিনিটের বেশি
                                আকাশে পবিত্র শাওয়ালের এ চাঁদ দেখা যেতে পারে। ৯ এপ্রিল পাকিস্তানের বেশির ভাগ অঞ্চলের আকাশ পরিষ্কার থাকবে, তবে উত্তরাঞ্চলে কিছুটা মেঘলা  থাকতে পারে বলে জানিয়েছে আবহাওয়া অফিস।
                            </span>
                        </a>

                    </marquee>
                </div>
            </div>
        </div>
</template>


<style>
    /*social-buttons */
    .social-buttons a {
        display: inline-flex;
        text-decoration: none;
        color: white;
        font-size: 14px;
        width: 35px;
        height: 35px;
        justify-content: center;
        align-items: center;
        position: relative;
        background: linear-gradient(95deg, #777, #222);
        border-radius: 50%;
        margin-right: 8px;
    }

    .social-buttons a {
        transition: 0.2s ease-in;
    }

    .social-buttons a:hover {
        transform: scale(1.2);
    }

    @media only screen and (max-width: 600px) {
        .styleFollowUs {
            text-align: center;
        }
    }



    /* SCorrl */
    .scrlstyle {
        font-size: 18px;
    }

    .bttttn {
        font-size: 22px;
        color: white;
    }

    @media only screen and (max-width: 600px) {
        .bttttn {
            font-size: 24px;
            color: white;
        }
    }

    @media only screen and (max-width: 600px) {
        .cardtopbox {
            height: 100%;
            width: 100%;
        }

        .cardtopbox h1 {
            font-size: 20px;
            font-weight: 700;
        }

        .cardtopbox h4 {
            text-align: right;
            font-size: 18px;
        }
    }
</style>
