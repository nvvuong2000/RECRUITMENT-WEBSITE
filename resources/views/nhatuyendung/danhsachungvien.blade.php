@extends('home_layout')
@section('home_content')
<style>
    .box {}
</style>
<div class="careerfy-wrapper">
    <!-- Main Content -->
    <div class="careerfy-main-content">
        <!-- Main Section -->
        <div class="careerfy-main-section careerfy-top-full">
            <div class="container">
                <div class="row">
                    <aside class="careerfy-column-3">
                        <div class="careerfy-typo-wrap">
                            <div class="careerfy-employer-dashboard-nav">
                                <figure>
                                    <a href="#" class="employer-dashboard-thumb"><img style="height:100%" src="{{$user[0]->link}}" alt=""></a>
                                </figure>
                                <ul>
                                    <li><a href="{{URL::to('/thongtin-doanhnghiep')}}"></i> Thông tin doanh nghiệp</a></li>
                                    <li><a href="{{URL::to('/capnhat-doanhnghiep')}}"></i> Cập nhật doanh nghiệp</a></li>
                                    <li class="active"><a href="{{URL::to('/danh-sach-ung-tuyen')}}"> Danh sách ứng tuyển</a></li>
                                    <li><a href="{{URL::to('/dangtuyen-nhanvien')}}"> Đăng tuyển nhân viên</a></li>
                                    <li><a href="{{URL::to('/quanly-tintuyendung')}}">Quản lý tin tuyển dụng</a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </aside>
                    <div class="careerfy-column-9">
                        <div class="careerfy-typo-wrap">
                            <div class="careerfy-employer-dasboard">
                                <div class="careerfy-employer-box-section">
                                    <div class="careerfy-filterable">
                                        <!-- Profile Title -->
                                        <div class="careerfy-profile-title">
                                            <h2>Danh sách ứng tuyển</h2>
                                            <ul>
                                                <li>
                                                    <!-- <i class="fas fa-filter"></i> -->
                                                    <div class="careerfy-filterable-select">
                                                        <form method="post" action="{{URL::to('/danh-sach-ung-tuyen')}}">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="id" value="{{$_SESSION['id']}}" />
                                                            <div class="form-group">
                                                                <select name="loai" class="form-control" class="box" style=" padding-left: 50px;
        width: 198px;
        color: white;
        background: #2980b9;
        text-transform: uppercase;
        text-align: center">


                                                                    <option value="1">Từ chối</option>
                                                                    <option value="0">Chấp nhận</option>
                                                                    <option selected value="2">Đang xử lí</option>
                                                                    <option value="0" selected disabled hidden>Vui lòng chọn</option>
                                                                </select>
                                                                <input type="submit" value="Lọc" class="btn btn-sm btn-primary" />
                                                            </div>

                                                        </form>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Resumes -->
                                    <div class=" careerfy-employer-resumes">
                                        <ul class="careerfy-row">
                                            @foreach($chitiet as $key => $ct)
                                            <li class="careerfy-column-6">
                                                <div class="careerfy-employer-resumes-wrap">
                                                    @if ($ct->trangthai == 0 || $ct->trangthai==1)
                                                    <figure>
                                                        <a href="#" class="careerfy-resumes-thumb"><img src="{{$ct->link}}" alt=""></a>
                                                        <!-- <a> "{{$ct->ungvien_id}}"</a> -->
                                                        <figcaption>
                                                            <span class="careerfy-resumes-subtitle">{{$ct->user_email}}</span>
                                                            <ul>
                                                                <li>
                                                                    <strong>Địa chỉ:</strong> {{$ct->diachi}}
                                                                </li>
                                                                <li>
                                                                    <!-- <span> -->
                                                                    <strong>Ngày nộp:</strong>
                                                                    <br />
                                                                    {{$ct->thoigiannop}}
                                                                    <!-- </span> -->
                                                                    <!-- <small>p.a minimum</small> -->
                                                                </li>
                                                            </ul>
                                                        </figcaption>
                                                    </figure>
                                                    <ul class="careerfy-resumes-options">
                                                        <!-- <li><a href="#"><i class="careerfy-icon careerfy-mail"></i> </a></li    -->
                                                        
                                                        <li><a href="{{URL::to('/thongtin-ungvien/'.$ct->ungvien_id)}}"><i class="careerfy-icon careerfy-mail"></i> Xem thông tin</a></li>
                                                        <li><a href="{{$ct->link_cv}}">Xem CV</a></li>

                                                    </ul>
                                                    @else
                                                    <figure>
                                                        <a href="#" class="careerfy-resumes-thumb"><img src="{{$ct->link}}" alt=""></a>
                                                        <!-- <a> "{{$ct->ungvien_id}}"</a> -->
                                                        <figcaption>
                                                            <span class="careerfy-resumes-subtitle">{{$ct->user_email}}</span>
                                                            <ul>
                                                                <li>
                                                                    <strong>Địa chỉ:</strong> {{$ct->diachi}}
                                                                </li>
                                                                <li>
                                                                    <!-- <span> -->
                                                                    <strong>Ngày nộp:</strong>
                                                                    <br />
                                                                    {{$ct->thoigiannop}}
                                                                    <!-- </span> -->
                                                                    <!-- <small>p.a minimum</small> -->
                                                                </li>
                                                            </ul>
                                                        </figcaption>
                                                    </figure>
                                                    <ul class="careerfy-resumes-options">
                                                        <!-- <li><a href="#"><i class="careerfy-icon careerfy-mail"></i> </a></li    -->
                                                        <li><a data-toggle="modal" href="#myModal">Phản hồi</a></li>
                                                        <li><a href="{{URL::to('/thongtin-ungvien/'.$ct->ungvien_id)}}"><i class="careerfy-icon careerfy-mail"></i> Xem thông tin</a></li>
                                                        <li><a href="{{$ct->link_cv}}">Xem CV</a></li>

                                                        <div class="modal" id="myModal">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal Header -->
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <div style="width:100%;" class="careerfy-contact-form">
                                                                            <h2>Lời nhắn đến ứng viên!</h2>
                                                                            <form method="POST" action="{{URL::to('/comment')}}">
                                                                                {{csrf_field()}}
                                                                                <ul>
                                                                                    <li style="width:50%;" class="careerfy-contact-form-full">
                                                                                        <input type="radio" value="0" name="luachon" class="custom-control-input" checked> Chấp Nhận
                                                                                    <li style="width:50%;" class="careerfy-contact-form-full">
                                                                                        <input type="radio" value="1" name="luachon" class="custom-control-input"> Từ chối
                                                                                        <!-- <label class="custom-control-label pmd-radio-ripple-effect" for="customRadioInline1">1</label> -->
                                                                                    </li>
                                                                                    <input type="hidden" value="{{$ct->ungvien_id}}" name="id" />
                                                                                    <input type="hidden" value="{{$ct->tintd_id}}" name="tintd_id" />
                                                                                    <li class="careerfy-contact-form-full">
                                                                                        <textarea name="loinhan" cols=80 rows=10>Track your results on the local or global market , depending on your needs. You can track everything in the most popular search engines - Google, Bing, Yahoo and Yandex. Improve your search performance and increase traffic with our turn-key. Positionly is the only solution on the market that provides a simple and transparent way to monitor.the effectiveness.</textarea>
                                                                                    </li>
                                                                                    <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
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
                                                    </ul>
                                                </div>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
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