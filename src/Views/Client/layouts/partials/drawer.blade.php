<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <div class="wraper_img">
            <img src="/image/phone.jpg" alt="">
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="wrapp_danhmuc">

            <li><a href="/san_pham/index.php?keyword=">ffafafa</a></li>

                @foreach ($categorys as $category)
                        <div class="swiper-slide">
                            <a href="">
                                <div class="img_box">
                                    <img src="{{ asset($category['image']) }}" alt="">
                                </div>
                                <div class="tieudeanh">
                                    <h5 class="tieudend">{{ $category['name'] }}</h5>
                                </div>
                            </a>
                        </div>
                    @endforeach



        </ul>
    </div>
</div>
