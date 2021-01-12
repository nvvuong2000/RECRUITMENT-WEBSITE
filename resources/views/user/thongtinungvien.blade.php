@extends('home_layout')
@section('home_content')

<div class="careerfy-main-content">
  @if(session()->has('success'))
  <div class="alert alert-info text-center " style="font-size:16px">
    {{ session()->get('success') }}
  </div>
  @endif
  <!-- Main Section -->
  <div class="careerfy-main-section careerfy-dashboard-fulltwo">
    <div class="container">
      <div class="row">
        <aside class="careerfy-column-3">
          <div class="careerfy-typo-wrap">
            <div class="careerfy-employer-dashboard-nav">
              @if(isset($_SESSION['id_quyen']) && $_SESSION['id_quyen']==0)


              <figure>
                <a href="#" class="employer-dashboard-thumb"><img style="height:100%" src="{{$uv[0]->link}}" alt=""></a> -->

              </figure>
              <ul>
                <li class="active"><a href="{{URL::to('/thongtin-ungvien')}}"></i> Thông tin ứng viên</a></li>
                <li><a href="{{URL::to('/cap-nhat-ung-vien')}}"> Cập nhật ứng viên</a></li>
                <li><a href="{{URL::to('/quan-li-ho-so')}}"></i> Quản lí hồ sơ</a></li>
                <li><a href="{{URL::to('/danh-sach-nop-don/'.$_SESSION['id'])}}"> Đã Apply</a></li>

              </ul>
              @else
              @endif
            </div>

          </div>
        </aside>
        <div class="careerfy-column-9">
          <div class="careerfy-typo-wrap">
            <form method="post">
              {{csrf_field()}}
              <div class="careerfy-employer-box-section">
                <div class="careerfy-profile-title">
                  <h2>THÔNG TIN ỨNG VIÊN</h2>
                </div>
                @foreach($uv as $key => $uv)
                <ul class="careerfy-row careerfy-employer-profile-form">
                  <input value="{{$_SESSION['id']}}" name="id_doanhnghiep" type="hidden">
                  <li class="careerfy-column-6">
                    <label>Tên ứng viên</label>
                    <input value="{{$uv->user_hoten}}" name="ten" type="text" readonly>
                  </li>
                  <li class="careerfy-column-6">
                    <label>Ngày sinh</label>
                    <input name="user_ngaysinh" value="{{$uv->user_ngaysinh}}" type="date">
                  </li>
                  <li class="careerfy-column-6">
                    <label>Giới tính</label>
                    <select name="tinhthanh">
                      @foreach($gioitinh as $key =>$gioitinh)

                      <option value="{{$gioitinh->id_gioitinh}}" <?php
                                                                  if ($gioitinh->id_gioitinh == $uv->id_gioitinh) {
                                                                    echo 'selected';
                                                                  } else {
                                                                    echo '';
                                                                  } ?>>{{$gioitinh->ten_gioitinh}}</option>
                      @endforeach
                    </select>
                  </li>
                  <li class="careerfy-column-6">
                    <label>Email *</label>
                    <input name="email" value="{{$uv->user_email}}" type="text" readonly>
                  </li>
                  <li class="careerfy-column-6">
                    <label>Số điện thoại *</label>
                    <input name="sdt" value="{{$uv->user_sdt}}" type="text" readonly>
                  </li>
                  <li class="careerfy-column-6">
                    <label>Bằng cấp</label>
                    <div class="careerfy-profile-select">
                      <select name="bangcap">
                        @foreach($bangcap as $key =>$bangcap)

                        <option value="{{$bangcap->bangcap_id}}" <?php
                                                                  if ($bangcap->bangcap_id == $uv->id_bangcap) {
                                                                    echo 'selected';
                                                                  } else {
                                                                    echo '';
                                                                  } ?>>{{$bangcap->bangcap_ten}}</option>
                        @endforeach
                      </select>
                    </div>
                  </li>

                </ul>
              </div>
              <div class="careerfy-employer-box-section">
                <div class="careerfy-profile-title">
                  <h2>Vị trí</h2>
                </div>
                <ul class="careerfy-row careerfy-employer-profile-form">


                  <li class="careerfy-column-6">
                    <label>Tỉnh/thành phố *</label>
                    <div class="careerfy-profile-select">
                      <select name="tinhthanh">
                        @foreach($tinhthanh as $key =>$tinhthanh)
                        <option value="{{$tinhthanh->tinhthanh_id}}" selected=" <?php $tinhthanh->tinhthanh_id == $uv->thanhpho_id ? 'selected' : ''; ?>">{{$tinhthanh->tinhthanh_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </li>

                  <li class="careerfy-column-10">
                    <label>Địa chỉ đầy đủ *</label>
                    <input name="diachi" value="{{$uv->user_diachi}}" readonly onblur="if(this.value == '') { this.value ='Ha Dong - Ha Noi - Viet Nam'; }" onfocus="if(this.value =='Ha Dong - Ha Noi - Viet Nam') { this.value = ''; }" type="text">
                  </li>

                  <li class="careerfy-column-12">
                    <div class="careerfy-profile-map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d22589232.038285658!2d-103.9763543971716!3d46.28054447273778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1507595834401"></iframe></div>
                    <span class="careerfy-short-message">For the precise location, you can drag and drop the pin.</span>
                  </li>

                </ul>
              </div>
              @endforeach

            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Main Section -->
</div>

@endsection