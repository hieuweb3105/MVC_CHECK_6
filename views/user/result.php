<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Lắng nghe sự kiện click
        document.getElementById('continue').addEventListener('click', function () {
            // Cuộn xuống 100vh
            window.scrollBy({
                top: window.innerHeight, // Cuộn xuống 1 khoảng 100vh
                behavior: 'smooth' // Hiệu ứng cuộn mượt mà
            });
        });

        // Lắng nghe sự kiện cuộn
        window.addEventListener('scroll', function () {
            const scrollPosition = window.scrollY; // Lấy vị trí cuộn hiện tại
            const threshold = window.innerHeight * 0.3; // Tính 20vh

            // Kiểm tra nếu vị trí cuộn lớn hơn 40vh
            if (scrollPosition > threshold) {
                document.getElementById('continue').style.opacity = '0'; // Đặt opacity thành 0
            } else {
                document.getElementById('continue').style.opacity = '1'; // Đặt opacity trở lại 1
            }
        });
    });
</script>

<div class="container d-flex justify-content-center mt-5">
    <div class="col-12 col-md-8 col-lg-6 d-flex flex-column gap-3 gap-lg-1 bg-dark bg-opacity-50 p-3 rounded-4 mb-lg-0 shadow text-light animate__animated animate__bounceInLeft">
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-lg-between">
            <div class="fw-bold">
                Họ và tên
            </div>
            <div class="fw-info fs-4">
                <?= $_SESSION['temp']['result'][0] ?>
            </div>
        </div>
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-lg-between">
            <div class="fw-bold">
                Số phòng
            </div>
            <div class="fw-info fs-4">
                <?= $_SESSION['temp']['result'][8] ?? '<span class="small fst-italic">(trống)</span>' ?>
            </div>
        </div>
        <!-- <div class="d-flex flex-column flex-lg-row align-items-center justify-content-lg-between">
            <div class="fw-bold text-center">
                Số người ở cùng
            </div>
            <div class="fw-info fs-4">
                <?= $_SESSION['temp']['result'][7] ?? '<span class="small fst-italic">(trống)</span>' ?>
            </div>
        </div> -->
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-lg-between">
            <div class="fw-bold">
                Người ở cùng
            </div>
            <div class="fw-info fs-4 text-center text-lg-end">
                <?php
                if (!empty($_SESSION['temp']['roomate'])) {
                    foreach ($_SESSION['temp']['roomate'] as $person) {
                        echo $person[0] . '<br>';
                    }
                } else { ?>
                    <span class="small text-light fst-italic">không có</span>
                <?php } ?>
            </div>
        </div>
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-lg-between">
            <div class="fw-bold">
                Hạng phòng
            </div>
            <div class="fw-info fs-4">
                <?= $_SESSION['temp']['result'][9] ?? '<span class="small fst-italic">(trống)</span>' ?>
            </div>
        </div>
    </div>
</div>

<!-- <div class="col-12 text-center mt-4">
    <div id="continue" class="fw-bold fs-6 text-main text-uppercase">
        <i class="bi bi-chevron-down me-2"></i>Nhấn để xem hoạt động chi tiết
        <div class="">Click to view</div>
    </div>
</div> -->

<div class="col-12 col-md-8 col-lg-4 mt-4 px-2 animate__animated animate__bounceInRight animate__delay-1s">
    <img class="w-100" src="<?= URL_STORAGE ?>system/timeline.jpg" alt="timeline.jpg">
</div>

<div class="text-center">
    <a id="feedback" href="/feedback" class="btn btn-dark fs-6 px-4 fw-bold btn my-5">
        Đánh giá dịch vụ / Feedback
    </a>
</div>