@extends('home_layout')
@section('home_content')
<!-- Main Content -->
<div class="careerfy-main-content">
    <div class="careerfy-main-section careerfy-dashboard-fulltwo">
        <div class="container">
            @if(session()->has('success'))
            <div class="alert alert-info text-center " style="font-size:16px">
                {{ session()->get('success') }}
            </div>
            @elseif(session()->has('error'))
            <div class="alert alert-danger text-center " style="font-size:16px">
                {{ session()->get('error') }}
            </div>
            @endif
            <div class="row">
                <aside class="careerfy-column-3">
                    <div class="careerfy-typo-wrap">
                        <div class="careerfy-employer-dashboard-nav">
                            <figure>

                                <a href="#" class="employer-dashboard-thumb"><img style="height:100%" src="{{$user[0]->link}}" alt=""></a>


                            </figure>
                            <ul>
                                <li><a href="{{URL::to('/thongtin-ungvien')}}"></i> Thông tin ứng viên</a></li>
                                <li><a href="{{URL::to('/cap-nhat-ung-vien')}}"> Cập nhật ứng viên</a></li>
                                <li><a href="{{URL::to('/quan-li-ho-so')}}"></i> Quản lí hồ sơ</a></li>
                                <li class="active"><a href="{{URL::to('/danh-sach-nop-don/'.$_SESSION['id'])}}"> Đã Apply</a></li>

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
                                        <div class="careerfy-table-cell"><strong>Vị trí<strong></div>
                                        <!-- <div class="careerfy-table-cell">Applications</div> -->
                                        <div class="careerfy-table-cell"><strong>Lời nhắn<strong> </div>
                                        <div class="careerfy-table-cell"><strong>Trạng thái<strong></div>
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
                                                echo "<div class='careerfy-table-cell'></div>";
                                            }
                                            if ($ct->trangthai == 0 || $ct->trangthai == 1) {
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
                                                    if ($ct->trangthai == 2) {
                                                        // {{URL ::to('/chitiet-tintuyendung/'.$luu->id_tintuyendung)}}
                                                        $url1 = URL::to('/xoa_don/' . $_SESSION['id'] . '/' . $ct->id_tintuyendung);
                                                        $url2 = URL::to('/chitiet-tintuyendung/' . $ct->id_tintuyendung);
                                                        echo "<a href='{$url1}' class='jobsearch-savedjobs-links'><i class='fas fa-trash'></i></a>";
                                                        echo "<a href='{$url2}' class='jobsearch-savedjobs-links jobsearch-delete-applied-job' data-id='324' > <i class='far fa-eye'></i></a>";
                                                    }
                                                    if ($ct->trangthai == 0 || $ct->trangthai == 1) {
                                                        $url = URL::to('/chitiet-tintuyendung/' . $ct->id_tintuyendung);
                                                        echo "<a href='{$url}' class='jobsearch-savedjobs-links jobsearch-delete-applied-job' data-id='324' > <i class='far fa-eye'></i></a>";
                                                    }
                                                    // 
                                                    ?>
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