<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartment Details</title>
    <link rel="stylesheet" href="css/styledetail.css">
</head>
<body>
    <div class="container-fluid px-4">
        <!-- 主图区域 -->
        <div class="main-image-container position-relative mb-4">
            <div class="image-wrapper">
                <img src="pics/detail/apartment-main.webp" alt="Apartment main view" class="slide active">
                <img src="pics/detail/apartment-main2.webp" alt="Apartment second view" class="slide">
            </div>
            <button type="button" class="nav-btn prev-btn">❮</button>
            <button type="button" class="nav-btn next-btn">❯</button>
            <div class="image-counter"></div>
        </div>

        <!-- 基本信息区域 -->
        <div class="row">
            <div class="col-md-8">
                <div class="property-header mb-4">
                    <h1>Furnished apartment for rent</h1>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="property-details">
                            <span>2 rooms</span>
                            <span class="separator">•</span>
                            <span>42 m²</span>
                            <span class="separator">•</span>
                            <span>Floor 3/-</span>
                        </div>
                        <div class="price">
                            <i class="fas fa-check-circle"></i>
                            <span class="amount">1,995 € cc</span>
                        </div>
                    </div>
                    <div class="location-info">
                        <p>Les Halles district in Paris (75001)</p>
                        <div class="metro-lines">
                            <span class="metro-line m">M</span>
                            <span class="metro-line">4</span>
                            <span class="metro-line">11</span>
                            <span class="metro-line">1</span>
                            <span class="metro-line">14</span>
                            <span class="metro-line">7</span>
                            <span class="metro-line rer">RER</span>
                            <span class="metro-line">A</span>
                            <span class="metro-line">B</span>
                            <span class="metro-line">D</span>
                        </div>
                    </div>
                </div>

                <!-- 功能按钮组 -->
                <div class="action-buttons">
                    <div class="action-item">
                        <img src="pics/detail/desktop-map-neighbourhood.ext.svg" alt="Map">
                        <div>Discover the neighborhood</div>
                    </div>
                    <div class="action-item">
                        <img src="pics/detail/desktop-time-of-travel-address.ext.svg" alt="Time">
                        <div>Calculate a travel time</div>
                    </div>
                    <div class="action-item">
                        <img src="pics/detail/desktop-street-view.ext.svg" alt="View">
                        <div>Launch Immersive View</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-form-wrapper">
                    <div class="card border shadow-sm">
                        <div class="card-body" style="border: 1px solid #ccc; border-radius: 5px;">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="d-flex align-items-center">
                                    <h3 class="mb-0 me-3">BOOK A FLAT</h3>
                                    <img src="pics/detail/book_flat.webp" alt="Book A Flat" height="30">
                                </div>
                            </div>
                            <a href="#" class="phone-link">
                                <i class="fas fa-phone"></i> Show phone number
                            </a>
                            <form action="contract.php" method="post">
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Phone</label>
                                    <input type="tel" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Add a message? (optional)</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="terms" required>
                                    <label class="form-check-label">
                                        I do not wish to receive similar ads and personalized suggestions from SeLoger.
                                    </label>
                                    <a href="#" class="d-block mt-1">Learn more</a>
                                </div>
                                <button type="submit" class="btn btn-contact w-100">
                                    Contact the agency
                                </button>
                            </form>
                            <div class="mt-4 d-flex justify-content-between align-items-center">
                                <span class="text-muted">Ref.11055</span>
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-flag"></i> Report this ad
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
    </div>

<?php include 'footer.php'; ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 获取元素
    const slides = document.querySelectorAll('.slide');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    const counter = document.querySelector('.image-counter');
    
    let currentIndex = 0;
        
    // 下一张
    nextBtn.onclick = function() {
        slides[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % slides.length;
        slides[currentIndex].classList.add('active');
    };
    
    // 上一张
    prevBtn.onclick = function() {
        slides[currentIndex].classList.remove('active');
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        slides[currentIndex].classList.add('active');
    };
    
  
});
</script>
</body>
</html>