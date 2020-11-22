@extends('home_layout')
@section('home_content')
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
                                    <li class="active"><a href="{{URL::to('//thongtin-doanhnghiep')}}"></i> Thông tin doanh nghiệp</a></li>
                                    <!-- <li><a href="{{URL::to('/quan-li-ho-so')}}"></i> Quản lí hồ sơ</a></li> -->
                                    <li><a href="{{URL::to('/danhsach-ungtuyen')}}"> Danh sách ứng tuyển</a></li>

                                    <li><a href="{{URL::to('/dangtuyen-nhanvien')}}"> Đăng tuyển nhân viên</a></li>
                                    <li><a href="{{URL::to('/quanly-tintuyendung')}}">Quản lý tin tuyển dụng</a></li>

                                    <li><a href="candidate-dashboard-changed-password.html"> Đổi mật khẩu</a></li>
                                    <li><a href="{{URL::to('/dangxuat')}}"> Đăng xuất</a></li>
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
                                            <h2>Shortlisted Resumes</h2>

                                            <ul>
                                                <li>
                                                    <i class="careerfy-icon careerfy-sort"></i>
                                                    <div class="careerfy-filterable-select">
                                                        <select>
                                                            <option>Sort</option>
                                                            <option>Sort</option>
                                                            <option>Sort</option>
                                                        </select>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Resumes -->
                                    <div class="careerfy-employer-resumes">
                                        <ul class="careerfy-row">
                                            <li class="careerfy-column-6">
                                                <div class="careerfy-employer-resumes-wrap">
                                                    <figure>
                                                        @foreach($chitiet as $key => $ct)
                                                        <a href="#" class="careerfy-resumes-thumb"><img src="extra-images/resumes-list-thumb-1.jpg" alt=""></a>
                                                        <!-- <a> "{{$ct->ungvien_id}}"</a> -->
                                                        <figcaption>

                                                            <h2><a href="#">{{$ct->user_hoten}}</a> <a href="#" class="careerfy-resumes-download"><i class="careerfy-icon careerfy-download-arrow"></i> Download CV</a></h2>
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
                                                        <li><a data-toggle="modal" href="#myModal">Open Modal</a></li>
                                                        <li><a href="#"><i class="careerfy-icon careerfy-user-1"></i> x</a></li>
                                                        <li><a href="#"><i class="careerfy-icon careerfy-mail"></i> View Profile</a></li>
                                                        <li class="display:none"><a href="#"><i class="careerfy-icon careerfy-user-1"></i> </a></li>
                                                        <li><a href="#"><i class="careerfy-icon careerfy-user-1"></i> -</a></li>



                                                        <div class="modal" id="myModal">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">

                                                                    <!-- Modal Header -->

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <div style="width:100%;" class="careerfy-contact-form">

                                                                            <h2>We want to hear form you!</h2>

                                                                            <form method="POST" action="{{URL::to('/comment')}}">
                                                                                {{csrf_field()}}
                                                                                <ul>

                                                                                    <li style="width:50%;" class="careerfy-contact-form-full">
                                                                                        <input type="radio" value="0" name="luachon" class="custom-control-input"> Chấp Nhận


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
                                                                    @endforeach
                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>



                                                    </ul>
                                                </div>
                                            </li>

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