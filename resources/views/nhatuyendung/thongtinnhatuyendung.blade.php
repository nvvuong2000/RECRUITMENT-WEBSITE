@extends('home_layout')
@section('home_content')


<div class="careerfy-main-content">
            
            <!-- Main Section -->
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
                                        <li class="active"><a href="{{URL::to('/thongtin-doanhnghiep')}}"></i> Thông tin doanh nghiệp</a></li>
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
                                <form action="{{url::to('/luu-doanhnghiep')}}" method="post">
                                        {{csrf_field()}}
                                    <div class="careerfy-employer-box-section">
                                        <div class="careerfy-profile-title"><h2>Thông tin doanh nghiệp</h2></div>
                                        <?php
    
            $message = Session::get('message');
    if($message)
    {
        echo $message;
        Session::put('message',null);
    }
    
     ?>
                                        <ul class="careerfy-row careerfy-employer-profile-form">
                                            <li class="careerfy-column-6">
                                                <label>Tên doanh nghiệp</label>

                                                <input value="" name="ten" onblur="if(this.value == '') { this.value ='raveholdings'; }" onfocus="if(this.value =='raveholdings') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Email *</label>
                                                <input name ="email" value="employer@localhost.com" onblur="if(this.value == '') { this.value ='employer@localhost.com'; }" onfocus="if(this.value =='employer@localhost.com') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Số điện thoại *</label>
                                                <input name="sdt" value="0979380947" onblur="if(this.value == '') { this.value ='0979380947'; }" onfocus="if(this.value =='0979380947') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Website</label>
                                                <input name="web" value="http://themeforest.net" onblur="if(this.value == '') { this.value ='http://themeforest.net/'; }" onfocus="if(this.value =='http://themeforest.net/') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Ngành nghề</label>
                                                <div class="careerfy-profile-select">
                                                    <select name="loai">
                                                        @foreach($loainganhnghe as $key =>$nganhnghe)
                                                            <option value="{{$nganhnghe->nganhnghe_id}}">{{$nganhnghe->nganhnghe_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </li>
                                            
                                            <li class="careerfy-column-12">
                                                <label >Mô tả *</label>
                                                <textarea name="mota"></textarea>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="careerfy-employer-box-section">
                                        <div class="careerfy-profile-title"><h2>Vị trí</h2></div>
                                        <ul class="careerfy-row careerfy-employer-profile-form">
                                           
                                           
                                            <li class="careerfy-column-6">
                                                <label>Tỉnh/thành phố *</label>
                                                <div class="careerfy-profile-select">
                                                    <select name="tinhthanh">
                                                        @foreach($tinhthanh as $key =>$tinhthanh)
                                                            <option value="{{$nganhnghe->nganhnghe_id}}">{{$tinhthanh->tinhthanh_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </li>
                                            
                                            <li class="careerfy-column-10">
                                                <label>Địa chỉ đầy đủ *</label>
                                                <input name="diachi" value="Ha Dong - Ha Noi - Viet Nam" onblur="if(this.value == '') { this.value ='Ha Dong - Ha Noi - Viet Nam'; }" onfocus="if(this.value =='Ha Dong - Ha Noi - Viet Nam') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-2">
                                                <button class="careerfy-findmap-btn">Find on Map</button>
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Latitude</label>
                                                <input value="51.4935825" onblur="if(this.value == '') { this.value ='51.4935825'; }" onfocus="if(this.value =='51.4935825') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-6">
                                                <label>Longitude</label>
                                                <input value="-0.16803379999998924" onblur="if(this.value == '') { this.value ='-0.16803379999998924'; }" onfocus="if(this.value =='-0.16803379999998924') { this.value = ''; }" type="text">
                                            </li>
                                            <li class="careerfy-column-12">
                                                <div class="careerfy-profile-map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d22589232.038285658!2d-103.9763543971716!3d46.28054447273778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1507595834401"></iframe></div>
                                                <span class="careerfy-short-message">For the precise location, you can drag and drop the pin.</span>
                                            </li>
                                        </ul>
                                    </div>
                                   
                                    <input type="submit" class="careerfy-employer-profile-submit" value="Save Setting">
                                </form>
                            </div>


                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Main Section -->

        </div>









@endsection