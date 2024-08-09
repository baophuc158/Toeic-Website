<?php
    include("header.php");
    if($_SESSION['vt']=='QTHT')
    {
        echo '<script>window.location.href="../Admin/index.php"</script>';
    }
    else
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        include('../controller/clt.php');
        $p=new cLT();
        if($_SESSION['vt']=='HV')
        {
            $check =$p->time_kiemtra($_SESSION['ID']);
            if(mysqli_num_rows($check) > 0)
            {
                while($row = mysqli_fetch_assoc($check))
                {
                    $end = new DateTime($row['date_end']);
                    $now = new DateTime();
                    $interval = $now->diff($end);
                    echo '<script>alert("Bạn còn ' . $interval->format('%m tháng %d ngày') . ' để hoàn thành xong lộ trình ' . $row['route_name'] . '");</script>';
                }
            }
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        
        <head>
            <title>ATI | Trang chủ</title>
        
        </head>
        <body>
            
            <!-- Start Slider -->
            <section id="mu-slider">
                <!-- Start single slider item -->
                <div class="mu-slider-single">
                    <div class="mu-slider-img">
                        <figure>
                            <img src="../assets/img/slider/1.jpg" alt="img">
                        </figure>
                    </div>
                    <div class="mu-slider-content">
                        <h4>Welcome To Ayaya Toeic IUH</h4>
                        <span></span>
                        <h2>Bạn cần tốt nghiệp đại học ? </h2>
                        <p></p>
                        <a href="#" class="mu-read-more-btn">Read More</a>
                    </div>
                </div>
                <!-- Start single slider item -->
                <!-- Start single slider item -->
                <div class="mu-slider-single">
                    <div class="mu-slider-img">
                        <figure>
                            <img src="../assets/img/slider/2.jpg" alt="img">
                        </figure>
                    </div>
                    <div class="mu-slider-content">
                        <h4>Hãy đến với chúng tôi</h4>
                        <span></span>
                        <h2>Bạn cần bổ sung vốn từ tiếng Anh ?</h2>
                        <p></p>
                        <a href="#" class="mu-read-more-btn">Read More</a>
                    </div>
                </div>
                <!-- Start single slider item -->
                <!-- Start single slider item -->
                <div class="mu-slider-single">
                    <div class="mu-slider-img">
                        <figure>
                            <img src="../assets/img/slider/3.jpg" alt="img">
                        </figure>
                    </div>
                    <div class="mu-slider-content">
                        <h4>Nội dung về tiếng Anh đa dạng</h4>
                        <span></span>
                        <h2>Tiếng Anh cho mọi người</h2>
                        <p></p>
                        <a href="#" class="mu-read-more-btn">Read More</a>
                    </div>
                </div>
                <!-- Start single slider item -->
            </section>
            <!-- End Slider -->
            <!-- Start service  -->
            <section id="mu-service">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="mu-service-area">
                                <!-- Start single service -->
                                <div class="mu-service-single">
                                    <span class="fa fa-book"></span>
                                    <h3>Học trực tuyến</h3>
                                    <p></p>
                                </div>
                                <!-- Start single service -->
                                <!-- Start single service -->
                                <div class="mu-service-single">
                                    <span class="fa fa-table "></span>
                                    <h3>Lộ trình đa dạng</h3>
                                    <p></p>
                                </div>
                                <!-- Start single service -->
                                <!-- Start single service -->
                                <div class="mu-service-single">
                                    <span class="fa fa-users"></span>
                                    <h3>Diễn đàn sôi nổi</h3>
                                    <p></p>
                                </div>
                                <!-- Start single service -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End service  -->
        
            <!-- Start about us -->
            <section id="mu-about-us">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mu-about-us-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="mu-about-us-left">
                                            <!-- Start Title -->
                                            <div class="mu-title">
                                                <h2>about ATI</h2>
                                            </div>
                                            <!-- End Title -->
                                            <p>Website dành cho các bạn sinh viên hay người đã đi làm muốn học thêm một ngôn ngữ thứ hai phục vụ cho việc học hoặc công việc.</p>
                                            <ul>
                                                <li>Được phát triển bởi 2 sinh viên năm 4 chuyên ngành IS tại IUH.</li>
                                                <li>Giáo trình được chọn lọc từ nhiều nguồn trên các website.</li>
                                                <li>Bài thi Toeic của ETS là đích đến để website xây dựng các bài test.</li>
                                                <li>Hi vọng mọi người sẽ đóng góp xây dựng ATI ngày một hoàn thiện hơn.</li>
                                            </ul>
                                            <p style="font-weight: bold;">Thank you !</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="mu-about-us-right">
                                            <a id="mu-abtus-video" href="https://www.youtube.com/embed/1HMnDELvTag" target="mutube-video">
                                                <img src="../assets/img/vergil.jpg" alt="img">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End about us -->
        
            <!-- Start latest course section -->
            <section id="mu-latest-courses">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="mu-latest-courses-area">
                                <!-- Start Title -->
                                <div class="mu-title">
                                    <h2>Những bài viết mới nhất</h2>
                                    <p>Nơi mà các bạn có thể đăng tải những kinh nghiệm bản thân cũng như tâm sự để mọi người có thể giúp đỡ lẫn nhau !</p>
                                </div>
                                <!-- End Title -->
                                <!-- Start latest course content -->
                                <div id="mu-latest-course-slide" class="mu-latest-courses-content">
                            <?php 
                                include('../controller/cbaiviet.php'); 
                                $p=new bai_post();
                                $minz = $p->view_post();
                                while($row=mysqli_fetch_assoc($minz))
                                {
                                    $chuyenmuc=$row['chuyenmuc'];
                                    $TieuDe=$row['TieuDe'];
                                    $Mota=$row['Mota'];
                                    $MaBV = $row['MaBV'];
                                    $Ngaydang=$row['ngaydang'];
                                    echo '
                                            <div class="col-lg-4 col-md-4 col-xs-12">
                                                <div class="mu-latest-course-single">
                                                    <figure class="mu-latest-course-img">
                                                        <a href="blog-single.php?chuyenmuc='.$chuyenmuc.'&tieude='.$TieuDe.'&post='.$MaBV.'"><img src="../assets/img/courses/1.jpg" alt="img"></a>
                                                        <figcaption class="mu-latest-course-imgcaption">
                                                            <a href="#">'.$chuyenmuc.'</a>
                                                            <span><i class="fa fa-clock-o"></i>'.$Ngaydang.'</span>
                                                        </figcaption>
                                                    </figure>
                                                    <div class="mu-latest-course-single-content">
                                                        <h4><a href="blog-single.php?chuyenmuc='.$chuyenmuc.'&tieude='.$TieuDe.'&post='.$MaBV.'">'.$TieuDe.'</a></h4>
                                                        <p>'.$Mota.'</p>
                                                        <div class="mu-latest-course-single-contbottom">
                                                            <a class="mu-course-details" href="blog-single.php?chuyenmuc='.$chuyenmuc.'&tieude='.$TieuDe.'&post='.$MaBV.'">Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                }
                            ?>
                            </div>
                            </div>   
                                <!-- End latest course content -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                                <!-- End latest course content -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End latest course section -->
        
            <!-- Start testimonial -->
            <section id="mu-testimonial">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mu-testimonial-area">
                                <div id="mu-testimonial-slide" class="mu-testimonial-content">
                                    <!-- start testimonial single item -->
                                    <div class="mu-testimonial-item">
                                        <div class="mu-testimonial-quote">
                                            <blockquote>
                                                <p>Trong tiếng Anh không có là not, chỉ có là only.</p>
                                            </blockquote>
                                        </div>
                                        <div class="mu-testimonial-img">
                                            <img src="../assets/img/teachers/Ayakaka.jpg" alt="img">
                                        </div>
                                        <div class="mu-testimonial-info">
                                            <h4>Bảo Phúc</h4>
                                            <span>Admin</span>
                                        </div>
                                    </div>
                                    <!-- end testimonial single item -->
                                    <!-- start testimonial single item -->
                                    <div class="mu-testimonial-item">
                                        <div class="mu-testimonial-quote">
                                            <blockquote>
                                                <p>Có trình độ hay không, không quan trọng. Quan trọng là important.</p>
                                            </blockquote>
                                        </div>
                                        <div class="mu-testimonial-img">
                                            <img src="../assets/img/teachers/joker.jpg" alt="img">
                                        </div>
                                        <div class="mu-testimonial-info">
                                            <h4>Hoàng Minh</h4>
                                            <span>Admin</span>
                                        </div>
                                    </div>
                                    <!-- end testimonial single item -->
                                    <!-- start testimonial single item -->
                                    <div class="mu-testimonial-item">
                                        <div class="mu-testimonial-quote">
                                            <blockquote>
                                                <p>I'm the best.</p>
                                            </blockquote>
                                        </div>
                                        <div class="mu-testimonial-img">
                                            <img src="../assets/img/teachers/Dio.jpg" alt="img">
                                        </div>
                                        <div class="mu-testimonial-info">
                                            <h4>Lil Zink Hòw </h4>
                                            <span>Staff</span>
                                        </div>
                                    </div>
                                    <!-- end testimonial single item -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End testimonial -->
        
            <?php
                include("footer.php");
            ?>
        </body>
        
        </html>
<?php
    }
?>