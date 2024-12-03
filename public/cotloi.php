<?php include("inc/top.php"); ?>
<div class="container">
    <div class="row">
        <div class="col-2">
            <div class="list-group">
                <a href="index.php?action=gioithieu" class=" list-group-item list-group-item-action
                <?php if (strpos($_SERVER["REQUEST_URI"], "gioithieu") != false) echo "active"; ?>
                " aria-current="true">
                    Giới Thiệu
                </a>
                <a href="index.php?action=cotloi" class=" bg-info border border-info list-group-item list-group-item-action
                <?php if (strpos($_SERVER["REQUEST_URI"], "cotloi") != false) echo "active"; ?>
                ">Giá Trị Cốt Lõi</a>
            </div>
        </div>
        <div class="col-10">
            <div class="container">
                <div class="row row-cols-2">
                    <div class="col">
                        <div class="card mb-4 ">
                            <div class="card-body ">
                                <h5 class="text-success card-title"><i class="bi bi-flower1"></i> Chất lượng</h5>
                                <p class="card-text">Trang web cần cung cấp những cây kiểng chất lượng cao và đảm bảo tính khỏe mạnh của chúng.
                                    Chất lượng sản phẩm là yếu tố quan trọng để đảm bảo sự hài lòng của khách hàng.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-4">
                            <div class="card-body ">
                                <h5 class="text-success card-title"><i class="bi bi-flower1"></i> Đa dạng</h5>
                                <p class="card-text">Đa dạng về kích thước, màu sắc, hình dáng và loại cây giúp khách hàng tìm thấy cây phù hợp với sở thích và nhu cầu của họ.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-4">
                            <div class="card-body ">
                                <h5 class="text-success card-title"><i class="bi bi-flower1"></i> Chăm sóc và hướng dẫn</h5>
                                <p class="card-text">Hướng dẫn về ánh sáng, nước, phân bón và chăm sóc định kỳ giúp khách hàng có thể quản lý và nuôi dưỡng cây của mình một cách hiệu quả.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-4">
                            <div class="card-body ">
                                <h5 class="text-success card-title"><i class="bi bi-flower1"></i> Đáng tin cậy</h5>
                                <p class="card-text">Điều này có thể đạt được thông qua việc cung cấp thông tin chi tiết về nguồn gốc và xuất xứ của cây,
                                    đảm bảo tính chính xác trong mô tả và đáp ứng đúng thời gian giao hàng.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("inc/bottom.php"); ?>