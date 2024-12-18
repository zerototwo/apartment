
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Housing Management</title>
    <link rel="stylesheet" href="css/styleindex.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
</head>
<body>
<!-- 顶部导航栏 -->
<header>
    <div class="logo">
        <img src="pics/logo.png" alt="Company Logo">
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="apartments.php">Apartment</a></li>
            <li><a href="#">My Intention</a></li>
            <li><a href="addiservice.php">Additional Service</a></li>
            <li><a href="login.php">Log in</a></li>
            <li><a href="register.php">Sign up</a></li>
            <li><a href="#">Help</a></li>
        </ul>
    </nav>
</header>

<!-- 搜索区域 -->
<div class="search-container">
    <div class="background-image">
        <img src="pics/bg.png" alt="Company Logo">
        <div class="search-bar">
            <h1>Welcome...</h1>
            <form action="#" method="GET">
                <select name="category" id="category" onchange="updateOptions()">
                    <option value="cities">Cities</option>
                    <option value="apartments">Apartments</option>
                    <option value="universities">Universities</option>
                </select>
                <input type="text" placeholder="Search..." name="query">
                <input type="submit" value="Search">
            </form>
            <div class="dropdown">
                <ul id="dropdown-options">
                    <li style="background-color: orange;opacity: 0.7;border-style: solid;border-radius: 9px"><a href="#">CROUS Créteil</a></li>
                    <li style="background-color: orange;opacity: 0.7;border-style: solid;border-radius: 9px"><a href="#">CROUS Grenoble - Alpes</a></li>
                    <li style="background-color: orange;opacity: 0.7;border-style: solid;border-radius: 9px"><a href="#">CROUS La Réunion et Mayotte</a></li>
                    <li style="background-color: orange;opacity: 0.7;border-style: solid;border-radius: 9px"><a href="#">CROUS Lille</a></li>
                    <li style="background-color: orange;opacity: 0.7;border-style: solid;border-radius: 9px"><a href="#">CROUS Limoges</a></li>
                    <li style="background-color: orange;opacity: 0.7;border-style: solid;border-radius: 9px"><a href="#">CROUS Lorraine</a></li>
                    <li style="background-color: orange;opacity: 0.7;border-style: solid;border-radius: 9px"><a href="#">CROUS Lyon</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- 主体内容 -->
<main>
    <!-- 价格地图与介绍 -->
    <section class="price-map-section">
        <div class="maincontainer">
            <div class="row">
                <div class="col-6">
                    <img src="pics/price-map.png" alt="Price Map" class="responsive-image">
                </div>
                <div class="col-6">
                    <h2>Discover real estate prices in France</h2>
                    <p>
                        Use SeLoger's price map to easily get information about the real estate market.
                        Discover the price per square meter for specific addresses, cities, and neighborhoods.
                    </p>
                    <a href="#" class="btn">Explore the price map →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 发布房产广告 -->
    <section class="sell-property-section">
        <div class="maincontainer">
            <div class="row">
                <div class="col-6">
                    <h2>Sell a property yourself on SeLoger</h2>
                    <ul>
                        <li>✅ Present your property and its characteristics</li>
                        <li>✅ Highlight what makes it unique</li>
                        <li>✅ Set the selling price of your house or apartment</li>
                    </ul>
                    <a href="#" class="btn">Post an ad →</a>
                </div>
                <div class="col-6">
                    <img src="pics/sell-property.png" alt="Sell Property" class="responsive-image">
                </div>
            </div>
        </div>
    </section>

    <!-- 合作伙伴展示区域 -->
    <section class="partners-section">
        <div class="maincontainer">
            <h2>Our best partners for your projects</h2>
            <div class="row">
                <!-- 卡片1 -->
                <div class="col-3">
                    <div class="partner-card">
                        <img src="pics/partner-sofinco.png" alt="Sofinco" class="simage">
                        <h3>Realize your projects with Sofinco</h3>
                        <p>Renovating your home or fitting out your interior? Sofinco offers tailored solutions.</p>
                        <a href="#" class="btn">Simulate your project →</a>
                    </div>
                </div>
                <!-- 卡片2 -->
                <div class="col-3">
                    <div class="partner-card">
                        <img src="pics/partner-nexity.png" alt="Nexity" class="simage">
                        <h3>Discover the world and commitment of Nexity</h3>
                        <p>Our new properties available at 5.5% VAT to become the owner of your main residence.</p>
                        <a href="#" class="btn">Discover →</a>
                    </div>
                </div>
                <!-- 卡片3 -->
                <div class="col-3">
                    <div class="partner-card">
                        <img src="pics/partner-castorama.png" alt="Castorama" class="simage">
                        <h3>Castorama, your work partner</h3>
                        <p>Furniture, faucets, and household appliances to complete your kitchen project.</p>
                        <a href="#" class="btn">Our professional advice →</a>
                    </div>
                </div>
                <!-- 卡片4 -->
                <div class="col-3">
                    <div class="partner-card">
                        <img src="pics/partner-maisons.png" alt="Maisons du Monde" class="simage">
                        <h3>Discover Maisons du Monde</h3>
                        <p>Create unique, warm, and sustainable living spaces.</p>
                        <a href="#" class="btn">View the collections →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 贷款保险部分 -->
    <section class="loan-insurance-section">
        <div class="maincontainer">
            <div class="row">
                <div class="col-6">
                    <img src="pics/loan-insurance.png" alt="Loan Insurance" class="responsive-image">
                </div>
                <div class="col-6">
                    <h2>Let's talk about loan insurance, Cardif experts are here to help!</h2>
                    <p>
                        Our advisors will help you choose the guarantees that suit your needs, at a competitive price.
                    </p>
                    <a href="#" class="btn">My price in 1 minute →</a>
                </div>
            </div>
        </div>
    </section>
</main>


<!-- 每日新闻 -->
<section class="daily-news">
    <h2>Tourism commercials</h2>
    <div class="news-main">
        <!-- 左侧缩略图 -->
        <div class="thumbnail-container">
            <img src="pics/news1-thumb.png" class="thumbnail" data-index="0" alt="News 1">
            <img src="pics/news2-thumb.png" class="thumbnail" data-index="1" alt="News 2">
            <img src="pics/news3-thumb.png" class="thumbnail" data-index="2" alt="News 3">
        </div>

    <div class="news-carousel">
        <div class="news-item">
            <a href="https://www.huarenjie.com/thread-7668599-1-1.html">
                <img src="pics/news1.jpg" alt="News 1">
                <p>Throughout the year France and Switzerland Golden Express Tour 488€/person including Golden Express tickets</p>
            </a>
        </div>
        <div class="news-item">
            <a href="https://www.huarenjie.com/thread-5201307-1-1.html">
                <img src="pics/news2.jpg" alt="News 2">
                <p>Paris, Portugal and Spain 9-Day Art Tour, Room Sharing, From 868 Euros/Person</p>
            </a>
        </div>
        <div class="news-item">
            <a href="https://www.huarenjie.com/thread-5096358-1-1.html">
                <img src="pics/news3.jpg" alt="News 3">
                <p>Only 828 Euros/person Visit New and Nostalgic Eastern Europe 9-day tour</p>
            </a>
        </div>
<!--        <div class="news-item">-->
<!--            <a href="https://www.huarenjie.com/forum.php?mod=viewthread&tid=8011227&extra=page%3D1">-->
<!--                <img src="pics/news4.jpg" alt="News 3">-->
<!--                <p>The whole experience of the sea, land and air experience single people only sell 920 Euros from two people to make a group</p>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="news-item">-->
<!--            <a href="https://www.huarenjie.com/thread-5096358-1-1.html">-->
<!--                <img src="pics/news4.jpg" alt="News 3">-->
<!--                <p>Only 828 Euros/person Visit New and Nostalgic Eastern Europe 9-day tour</p>-->
<!--            </a>-->
<!--        </div>-->
    </div>
</section>


<!-- 特性区域 -->
<!--<div class="features">-->
<!--    <div class="feature">-->
<!--        <img src="pics/free.png" alt="Free Reservation">-->
<!--        <a1 style="color: #ff5722">Free-Reservation</a1>-->
<!--        <p>We promise not to charge students any fees in any way.</p>-->
<!--    </div>-->
<!--    <div class="feature">-->
<!--        <img src="pics/price.png" alt="Price Guarantee">-->
<!--        <a1 style="color: #ff5722">Price Guarantee</a1>-->
<!--        <p>Our rates are not higher than the official rates of the apartment, subject to the same booking conditions.</p>-->
<!--    </div>-->
<!--    <div class="feature">-->
<!--        <img src="pics/service.png" alt="Personal Service">-->
<!--        <a1 style="color: #ff5722">Personal Service</a1>-->
<!--        <p>From the beginning of booking to successful check-in, the special person will follow up to provide you with thoughtful service.    </p>-->
<!--    </div>-->
<!--    <div class="feature">-->
<!--        <img src="pics/exclusive.png" alt="Exclusive Listing">-->
<!--        <a1 style="color: #ff5722">Exclusive Listing</a1>-->
<!--        <p>To meet different accommodation needs, we have carefully selected house rooms for you to choose from.</p>-->
<!--    </div>-->
<!--</div>-->

<!-- 特性区域 -->
<section class="features">
    <div class="feature" style="background-image: url('pics/free-bg.png');">
        <div class="feature-content">
            <img src="pics/free.png" alt="Free Reservation">
            <h3>Free Reservation</h3>
            <p>We promise not to charge students any fees in any way.</p>
        </div>
    </div>
    <div class="feature" style="background-image: url('pics/price-bg.png');">
        <div class="feature-content">
            <img src="pics/price.png" alt="Price Guarantee">
            <h3>Price Guarantee</h3>
            <p>Our rates are not higher than the official rates of the apartment.</p>
        </div>
    </div>
    <div class="feature" style="background-image: url('pics/service-bg.png');">
        <div class="feature-content">
            <img src="pics/service.png" alt="Personal Service">
            <h3>Personal Service</h3>
            <p>We provide you with thoughtful service from booking to check-in.</p>
        </div>
    </div>
    <div class="feature" style="background-image: url('pics/exclusive-bg.png');">
        <div class="feature-content">
            <img src="pics/exclusive.png" alt="Exclusive Listing">
            <h3>Exclusive Listing</h3>
            <p>Carefully selected house rooms to meet your accommodation needs.</p>
        </div>
    </div>
</section>


<!-- 操作步骤 -->
<div class="steps">
    <img src="pics/u30.png" alt="Step 1">
<!--    <img src="images/step2.png" alt="Step 2">-->
<!--    <img src="images/step3.png" alt="Step 3">-->
<!--    <img src="images/step4.png" alt="Step 4">-->
</div>

<!-- 页脚 -->
<footer>
    <ul class="footer-links">
        <li><a href="#">About us</a></li>
        <li><a href="#">Cooperation</a></li>
        <li><a href="Terms and Conditions">Agreement</a></li>
        <li><a href="contactme.php">Contact us</a></li>
        <li><a href="faq.php">FAQ</a></li>
    </ul>
    <ul class="social-icons">
        <li><a href="#">X</a></li>
        <li><a href="#">Reddit</a></li>
        <li><a href="#">Ins</a></li>
    </ul>
    <p>Copyright © 2077</p>
</footer>
</body>
<script>
    // $(document).ready(function(){
    //     $('.news-carousel').slick({
    //         dots: true,
    //         autoplay: true,
    //         autoplaySpeed: 4000,
    //         slidesToShow: 1,
    //         adaptiveHeight: true
    //     });
    // });

    $(document).ready(function () {
        // 初始化Slick轮播图
        $('.news-carousel').slick({
            arrows: true,
            prevArrow: '<button class="slick-prev">&lt;</button>',
            nextArrow: '<button class="slick-next">&gt;</button>',
            dots: false,
            fade: true, /* 切换时渐隐渐显 */
            autoplay: false,
            infinite: true
        });

        // 缩略图点击事件：切换主图
        $('.thumbnail').on('mouseenter click', function () {
            let index = $(this).data('index');
            $('.news-carousel').slick('slickGoTo', index);
        });

        // 鼠标悬浮局部放大
        $('.zoomable').on('mousemove', function (e) {
            const offsetX = e.offsetX / $(this).width() * 100;
            const offsetY = e.offsetY / $(this).height() * 100;
            $(this).css('transform-origin', `${offsetX}% ${offsetY}%`);
            $(this).css('transform', 'scale(1.5)');
        }).on('mouseleave', function () {
            $(this).css('transform', 'scale(1)');
        });
    });
</script>
</html>
