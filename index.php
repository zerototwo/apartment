<?php include 'header.php'; ?>

<!-- 搜索区域 -->
<div class="search-container">
    <div class="background-image">
        <img src="pics/bg.png" alt="Company Logo">
        <div class="search-bar">
            <h1>Welcome...</h1>
            <form action="apartments.php" method="GET">
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

<!-- 特性区域 -->
<div class="features">
    <div class="feature">
        <img src="pics/free.png" alt="Free Reservation">
        <a1 style="color: #ff5722">Free-Reservation</a1>
        <p>We promise not to charge students any fees in any way.</p>
    </div>
    <div class="feature">
        <img src="pics/price.png" alt="Price Guarantee">
        <a1 style="color: #ff5722">Price Guarantee</a1>
        <p>Our rates are not higher than the official rates of the apartment, subject to the same booking conditions.</p>
    </div>
    <div class="feature">
        <img src="pics/service.png" alt="Personal Service">
        <a1 style="color: #ff5722">Personal Service</a1>
        <p>From the beginning of booking to successful check-in, the special person will follow up to provide you with thoughtful service.    </p>
    </div>
    <div class="feature">
        <img src="pics/exclusive.png" alt="Exclusive Listing">
        <a1 style="color: #ff5722">Exclusive Listing</a1>
        <p>To meet different accommodation needs, we have carefully selected house rooms for you to choose from.</p>
    </div>
</div>

<!-- 操作步骤 -->
<div class="steps">
    <img src="pics/u30.png" alt="Step 1">
<!--    <img src="images/step2.png" alt="Step 2">-->
<!--    <img src="images/step3.png" alt="Step 3">-->
<!--    <img src="images/step4.png" alt="Step 4">-->
</div>

<?php include 'footer.php'; ?>

<script>
    function updateOptions() {
        // 可以在此处动态更新选项
    }
</script>