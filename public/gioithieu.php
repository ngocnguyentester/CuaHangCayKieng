<?php include("inc/top.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-2">
            <div class="list-group">
                <a href="index.php?action=gioithieu" class=" bg-info border border-info list-group-item list-group-item-action active" aria-current="true">
                    Giới Thiệu
                </a>
                <a href="index.php?action=cotloi" class="list-group-item list-group-item-action
                <?php if (strpos($_SERVER["REQUEST_URI"], "cotloi") != false) echo "active"; ?>
                ">Giá Trị Cốt Lõi</a>
            </div>
        </div>
        <div class="col-10">
            <!-- Start Carousel -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img style="height:200px;" src="../images/carousel/a1.png" class="d-block w-100" alt="a1.png">
                    </div>
                    <div class="carousel-item">
                        <img style="height:200px;" src="../images/carousel/a2.png" class="d-block w-100" alt="a2.png">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- End Carousel -->
            <h4 class="text-success pt-4 pb-2">GIỚI THIỆU</h4>
            <p>Chào mừng bạn đến với trang web của chúng tôi - một nơi tuyệt vời để khám phá và mua sắm các loại cây kiểng tuyệt đẹp cho không gian trong nhà và ngoài trời của bạn. </p>
            <p> Chúng tôi tận hưởng việc mang đến cho bạn một bộ sưu tập đa dạng và phong phú của các loại cây kiểng. Với sự đam mê với thiên nhiên và sự hiểu biết về cây cảnh, chúng tôi tự tin rằng bạn sẽ tìm thấy những loại cây phù hợp nhất cho không gian sống của mình. Dù bạn đang tìm kiếm một cây xanh tươi tắn để trang trí phòng khách, một cây mini nhỏ gọn để đặt trên bàn làm việc, hay một cây ngoại thất tạo điểm nhấn cho khu vườn của bạn, chúng tôi có đủ lựa chọn cho bạn.
            </p>
            <p>Chúng tôi cam kết cung cấp cho bạn những cây kiểng chất lượng cao, được chăm sóc kỹ lưỡng và đảm bảo sức khỏe. Chúng tôi cũng cung cấp thông tin chi tiết về cách chăm sóc và nuôi dưỡng cây kiểng để bạn có thể bảo quản và nuôi dưỡng chúng một cách tốt nhất.
            Hãy khám phá trang web của chúng tôi ngay bây giờ và mang về nhà những cây kiểng tuyệt đẹp để tạo thêm sự sống động và xanh mát cho không gian của bạn. Chúng tôi hy vọng bạn sẽ tìm thấy niềm vui và hài lòng khi mua sắm tại đây.</p>
        </div>
    </div>
</div>
<?php include("inc/bottom.php"); ?>