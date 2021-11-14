<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <!-- <div class="footer__logo">
                        <a href="#"><img src="{{asset('shop/img/footer-logo.png')}}" alt=""></a>
                    </div> -->
                    <p>Sự an tâm của khách hàng là điểm chúng tôi hướng đến</p>
                    <a href="#"><img src="{{asset('shop/img/payment.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Thương hiệu</h6>
                    <ul>
                        <li><a href="#">Obagi</a></li>
                        <li><a href="#">Paula's Choice</a></li>
                        <li><a href="#">The Ordinary</a></li>
                        <li><a href="#">La Roche Posay</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Liên hệ</h6>
                    <ul>
                        <li><a href="">Phone: +1234567</a></li>
                        <li><a href="">Email: shopping@gmail.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6>NewLetter</h6>
                    <div class="footer__newslatter">
                        <p>Hãy trở thành người đầu tiên nhận thông tin mới nhất</p>
                        <form action="#">
                            <input type="text" placeholder="Your email">
                            <button type="submit"><span class="icon_mail_alt"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form" action="{{route('guest.search')}}" method="GET">
            <input type="text" id="search-input" name="keyword" placeholder="Tìm kiếm...">
        </form>
    </div>
</div>
<!-- Search End -->

