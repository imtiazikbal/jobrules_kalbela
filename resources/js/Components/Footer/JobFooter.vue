<script setup>
    import {
        Link
    } from '@inertiajs/vue3';
</script>
<template>
    <section class="py-4 " style="background-color: #353535" >
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
				    <h6 class="pt-4 border-top"> Develop by _ <a class="text-light" href="https://digitalsolutions.ltd/">DigitalSolutions.Ltd</a> </h6>
				</div>
			</div>

		</div>
	</section>	
    <!-- News Scroll newsscroll.php-->
    <div class="fixed-bottom py-1" style="background:#343A40;">
            <div class="row">
    
                <div class="col">
                    <marquee direction="left" speed="normal" scrollamount="5" behavior="scroll" onmouseover="this.stop();" onmouseout="this.start();">
                        <template class="d-flex">
                            <a :href="route('jobsByTitle', { job: scroll.id })" v-for="scroll in $page.props.scoll" :key="scroll.id" class="text-white pr-3 text-decoration-none d-flex">
                                
                                <span class="scrlstyle d-flex">
                                    
                                    
                                    <img :src="'/'+ scroll.image" width="100%" class="mr-2" style="width: 45px; height: auto; border-radius: 10%; text-decoration: none;" alt="শিরোনাম" title="শিরোনাম">
                                    {{ scroll.title }}
                                   
                                </span>
                            </a>
                        </template>
                    </marquee>
                </div>
            </div>
        </div>
    <!-- Footer Scroll -->
    
    
    </template>
    <style>
    @media only screen and (max-width: 600px) {
  						.styleFollowUs { text-align: center;} 
    }
                                    
                                    .scrlstyle {
                                        font-size: 18px;
                                        font-weight: 600!important;
                                        padding-top:25px;
                                    }
                                    .bttttn {
                                        font-size: 24px;
                                        color: white;
                                    } @media only screen and (max-width: 600px) {
                                        .bttttn {
                                        font-size: 24px;
                                        color: white;
                                        }  
                                       .scrlstyle {
                                            font-size: 18px;
                                           }
                                    }
                            
                                   @media only screen and (max-width: 600px) {
                                        .cardtopbox {
                                          height: 100%;
                                          width: 100%;
                                        } 
                                        .cardtopbox h1 { 
                                          font-size: 24px;
                                          font-weight: 700;
                                        } 
                                        .cardtopbox h4 { 
                                          text-align: right;
                                          font-size: 18px;} 
                                      } 
                                
    </style>
