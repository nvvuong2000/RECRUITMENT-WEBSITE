@extends('home_layout')

<!-- @section('home') -->
@section('home_content')

<!-- @yield('home_content') -->
<div class="careerfy-main-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 careerfy-typo-wrap">
                <section class="careerfy-fancy-title">
                    <h2>DANH SÁCH CÁC NGÀNH NGHỀ</h2>

                </section>

                <div class="categories-list">

                    <ul class="careerfy-row">
                        <!-- <h1> Heloo </h1> -->
                        @foreach($dsnghe as $key => $loai)
                        <li class="careerfy-column-3">
                            <i class="{{$loai->class}}"></i>
                            <a href="{{URL ::to('/loai/'.$loai->id_loainganhnghe)}}">{{$loai->nganhnghe_name}}</a>
                            <span>{{$loai->count}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>


            </div>
            <div class="col-md-12 careerfy-typo-wrap">
                <!-- Fancy Title -->
                <section class="careerfy-fancy-title">
                    <h2>DANH SÁCH VIỆC LÀM NỔI BẬT</h2>

                </section>
                <!-- Featured Jobs Listings -->

                <div class="careerfy-job-listing careerfy-featured-listing">

                    <ul class="careerfy-row">
                        @foreach($hienthi_tintd as $key => $hienthi)

                        <li class="careerfy-column-6">
                            <div class="careerfy-table-layer">
                                <div class="careerfy-table-row">
                                    <figure><a href="{{URL ::to('/chitiet-tintuyendung/'.$hienthi->id_tintuyendung)}}"><img src="{{($hienthi->link)}}" alt=""></a></figure>
                                    <div class="careerfy-featured-listing-text">

                                        <a href="{{URL ::to('/chitiet-tintuyendung/'.$hienthi->id_tintuyendung)}}">
                                            <h2>{{$hienthi->TieuDe}}</h2>
                                        </a></br>


                                        Hạn nộp hồ sơ:</h3>
                                        <time>{{$hienthi->hannophoso}}</time>

                                        <div class="careerfy-featured-listing-options">
                                            <ul>
                                                <li>

                                                    <a href="#">{{'Số lượng tuyển:'.number_format($hienthi->soluong)}}</a>
                                                </li>
                                                <li>
                                                    <a href="#">{{$hienthi->diachi}}
                                                    </a>
                                                </li>
                                            </ul>



                                            <a href="#">
                                                {{$hienthi->gioitinh}}
                                            </a>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                </div>

                <!-- Featured Jobs Listings -->
                <!-- <div class="careerfy-plain-btn"> <a href="#">View All Jobs</a> </div> -->
            </div>

        </div>
    </div>
</div>
<!-- Main Section -->




</div>


@endsection