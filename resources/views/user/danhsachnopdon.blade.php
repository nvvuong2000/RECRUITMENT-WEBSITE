@extends('home_layout')
@section('home_content')
<!-- Main Content -->
<div class="careerfy-main-content">
    <div class="careerfy-main-section careerfy-dashboard-fulltwo">
        <div class="container">
            <div class="row">
                <aside class="careerfy-column-3">
                    <div class="careerfy-typo-wrap">
                        <div class="careerfy-employer-dashboard-nav">
                            <figure>
                                <a href="#" class="employer-dashboard-thumb"><img src="extra-images/employer-dashboard-1.png" alt=""></a>
                                <figcaption>
                                    <div class="careerfy-fileUpload">
                                        Upload Photo</span>
                                        <input type="file" class="careerfy-upload" />
                                    </div>
                                    <h2></h2>
                                </figcaption>
                            </figure>
                            <ul>
                                <li class="active"><a href="{{URL::to('/thongtin-ungvien')}}"></i> Thông tin ứng viên</a></li>
                                <!-- <li><a href="{{URL::to('/quan-li-ho-so')}}"></i> Quản lí hồ sơ</a></li> -->
                                <li><a href="{{URL::to('/danh-sach-ung-tuyen/'.$_SESSION['id'])}}"> Danh sách ứng tuyển</a></li>

                                <li><a href="{{URL::to('/thaydoimatkhau')}}"> Đổi mật khẩu</a></li>
                                <li><a href="{{URL::to('/dangxuat')}}"> Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                </aside>
                <div class="jobsearch-column-9 jobsearch-typo-wrap">
                    <div class="jobsearch-employer-box-section">
                        <div class="jobsearch-profile-title">
                            <h2>Applied Jobs</h2>
                        </div>
                        <div class="careerfy-managejobs-list-wrap">
                            <div class="careerfy-managejobs-list">
                                <!-- Manage Jobs Header -->
                                <div class="careerfy-table-layer careerfy-managejobs-thead">
                                    <div class="careerfy-table-row">
                                        <div class="careerfy-table-cell">Job Title</div>
                                        <!-- <div class="careerfy-table-cell">Applications</div> -->
                                        <div class="careerfy-table-cell">Featured</div>
                                        <div class="careerfy-table-cell">Status</div>
                                        <div class="careerfy-table-cell"></div>
                                    </div>
                                </div>
                                @foreach($chitiet as $key => $ct)
                                <div class="careerfy-managejobs-list">
                                    <div class="careerfy-table-layer careerfy-managejobs-tbody">
                                        <div class="careerfy-table-row">
                                            <div class="careerfy-table-cell">
                                                <span>@ {{$ct->tendoanhnghiep}}</span>
                                                <h6 class="jobsearch-pst-title"><a href="{{URL ::to('/chitiet-tintuyendung/'.$ct->id_tintuyendung)}}">{{$ct->TieuDe}}</a></h6>
                                                <ul>
                                                    <li><i class="fas fa-calendar-week"></i>{{$ct->thoigiannop}}</li>
                                                    <li><i class="fas fa-map-marker"></i>{{$ct->diachi}}
                                                </ul>
                                            </div>
                                            <?php

                                            if ($ct->trangthai == 2) {
                                            }
                                            if ($ct->trangthai == 0) {
                                                echo '<div class="careerfy-table-cell">
                                                <li><a data-toggle="modal" href="#myModal"><i class="far fa-envelope"></i></a></li>
                                            </div>';
                                            }
                                            ?>

                                            <?php
                                            if ($ct->trangthai == 2) {
                                                echo '<div class="careerfy-table-cell"><span class="careerfy-managejobs-option">Đang xử lý</span></div>';
                                            } else if ($ct->trangthai == 1) {
                                                echo '<div class="careerfy-table-cell"><span class="careerfy-managejobs-option">Từ chối</span></div>';
                                            } else if ($ct->trangthai == 0) {
                                                echo '<div class="careerfy-table-cell"><span class="careerfy-managejobs-option">Chấp nhận</span></div>';
                                            }
                                            ?>

                                            <div class="modal" id="myModal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div style="width:100%;" class="careerfy-contact-form">
                                                                <h2>Tin nhắn từ nhà tuyển dụng</h2>
                                                                <form method="POST" action="{{URL::to('/comment')}}">
                                                                    <ul>
                                                                        <li class="careerfy-contact-form-full">
                                                                            <textarea name="loinhan" cols=80 rows=10 readonly>{{$ct->loinhan}}</textarea>
                                                                        </li>
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    </ul>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="careerfy-table-cell">
                                                <div class="careerfy-managejobs-links">
                                                    <?php
                                                    $link = URL::to("/chitiet-tintuyendung/" . $ct->id_tintuyendung);
                                                    // $link_del =  {{!!route('xoa-don',['id_ungvien'=>$_SESSION['id'],'id_tintuyendung'=>$chitiet->id_tintuyendung])!!}};
                                                    // $link_del = URL::to("/xoa-don/".$ct->id_tintuyendung);
                                                    if ($ct->trangthai == 2) {
                                                        // echo "<a href='$link_del' class='jobsearch-savedjobs-links'><i class='fas fa-trash'></i></a>";
                                                        echo "<a href='{$link}' class='jobsearch-savedjobs-links jobsearch-delete-applied-job' data-id='324' > <i class='far fa-eye'></i></a>";
                                                    }
                                                    if ($ct->trangthai == 0) {
                                                        echo "<a href='{$link}' class='jobsearch-savedjobs-links jobsearch-delete-applied-job' data-id='324' > <i class='far fa-eye'></i></a>";
                                                    }
                                                    ?>
                                                    <!-- <a href="#" class="careerfy-icon careerfy-view"></a>
                                                    <a href="#" class="careerfy-icon careerfy-edit"></a>
                                                    <a href="#" class="careerfy-icon careerfy-rubbish"></a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main Section -->
            </div>
        </div>
    </div>
</div>
<!-- Main Content -->
@endsection