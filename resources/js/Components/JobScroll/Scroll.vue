<script setup>
</script>
<template>
<div class="fixed-bottom py-2" style="background:#343A40;">
    <div class="row">
        <div class="col">
            <marquee direction="left" speed="normal" scrollamount="5" behavior="scroll" onmouseover="this.stop();"
                onmouseout="this.start();">
                <a href="" class="text-white pr-3 text-decoration-none">
                    <span class="scrlstyle">
                        <img src=""
                            style="width: 45px; height: auto; border-radius: 10%; text-decoration: none;" alt="শিরোনাম"
                            title="শিরোনাম">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti asperiores fuga sit
                        voluptatibus vel laudantium eius dolore, suscipit earum quod, perferendis voluptas? Quo ex atque
                        sunt accusamus magni! Iste, placeat?
                    </span>
                </a>

            </marquee>
        </div>
    </div>
</div>
</template>
<style>
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