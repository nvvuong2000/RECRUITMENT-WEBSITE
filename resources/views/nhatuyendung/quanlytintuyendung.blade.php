@extends('home_layout')
@section('home_content')

<div class="careerfy-main-content">
    <div class="careerfy-main-section careerfy-dashboard-fulltwo">
        <div class="container">
            @if(session()->has('success'))
            <div class="alert alert-info text-center " style="font-size:16px">
                {{ session()->get('success') }}
            </div>
            @endif
            <div class="row">
                <aside class="careerfy-column-3">
                    <div class="careerfy-typo-wrap">
                        <div class="careerfy-employer-dashboard-nav">
                            <figure>
                                <a href="#" class="employer-dashboard-thumb"><img style="height:100%" src="{{$user[0]->link}}" alt=""></a>
                                <figcaption>
                                    <div class="careerfy-fileUpload">
                                        Upload Photo</span>
                                        <input type="file" class="careerfy-upload" />
                                    </div>
                                    <h2></h2>
                                </figcaption>
                            </figure>
                            <ul>
                                <li><a href="{{URL::to('/thongtin-doanhnghiep')}}"></i> Thông tin doanh nghiệp</a></li>
                                <li><a href="{{URL::to('/capnhat-doanhnghiep')}}"></i> Cập nhật doanh nghiệp</a></li>

                                <li><a href="{{URL::to('/danh-sach-ung-tuyen')}}"> Danh sách ứng tuyển</a></li>
                                <li><a href="{{URL::to('/dangtuyen-nhanvien')}}"> Đăng tuyển nhân viên</a></li>
                                <li class="active"><a href="{{URL::to('/quanly-tintuyendung')}}">Quản lý tin tuyển dụng</a></li>

                            </ul>
                        </div>
                    </div>
                </aside>
                <div class="careerfy-column-9">
                    <div class="careerfy-typo-wrap">
                        <div class="careerfy-employer-dasboard">
                            <div class="careerfy-employer-box-section">

                                <div class="careerfy-profile-title">
                                    <h2>Quản lý công việc</h2>
                                </div>

                                <div class="careerfy-managejobs-list-wrap">
                                    <div class="careerfy-managejobs-list">

                                        <div class="careerfy-table-layer careerfy-managejobs-thead">
                                            <div class="careerfy-table-row">
                                                <div class="careerfy-table-cell">Tiêu đề</div>
                                                <div class="careerfy-table-cell">Số lượt ứng tuyển</div>
                                                <div class="careerfy-table-cell">Trạng thái</div>
                                                <div class="careerfy-table-cell"></div>
                                            </div>
                                        </div>

                                        @foreach($luu_tintd as $key => $luu)
                                        <div class="careerfy-table-layer careerfy-managejobs-tbody">
                                            <div class="careerfy-table-row">
                                                <div class="careerfy-table-cell">
                                                    <h6><a href="{{URL ::to('/chitiet-tintuyendung/'.$luu->id_tintuyendung)}}">{{$luu->tieude}}</a></h6>
                                                    <ul>
                                                        <li> Thời hạn: <span>{{$luu->hannophoso}}</span></li>
                                                        {{$luu->gioitinh}}</li>
                                                        <li></i> <a href="#">{{$luu->diachi}}</a></li>
                                                    </ul>
                                                </div>
                                                <!-- ở đây  -->
                                                <div class="careerfy-table-cell"><a href="#" class="careerfy-managejobs-appli">{{$luu->soluongapply}} Ứng viên</a></div>
                                                <?php
                                                $today = date('Y-m-d');
                                                $hannop = $luu->hannophoso;
                                                if ($hannop > $today) {
                                                    echo ' <div class="careerfy-table-cell"><span class=" text-primary"> Còn hạn</span>';
                                                } else {
                                                    echo ' <div class="careerfy-table-cell"><span class="text-danger">Hết hạn</span>';
                                                }
                                                ?>
                                            </div>
                                            <div class="careerfy-table-cell">
                                                <div class="careerfy-managejobs-links">
                                                    <a href="{{URL ::to('/chitiet-tintuyendung/'.$luu->id_tintuyendung)}}" class="careerfy-managejobs-option">Xem</a>
                                                    <a href="{{URL ::to('/capnhat-tintuyendung/'.$luu->id_tintuyendung)}}" class="careerfy-managejobs-option">Sửa</a>
                                                    <!-- Ở đây -->
                                                    <?php if ($luu->soluongapply == 0) {
                                                        $link = URL::to('/xoa-tintuyendung/' . $luu->id_tintuyendung);

                                                        echo "<a href='$link' class='careerfy-managejobs-option'>Xóa</a>";
                                                    } else {
                                                        echo "";
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection