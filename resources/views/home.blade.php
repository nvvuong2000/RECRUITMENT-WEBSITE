@extends('home_layout')


<!-- @section('home_content') -->
<!-- Main Section -->

<div class="careerfy-main-section">
    <div class="container">
        <div class="row">

            <div class="col-md-12 careerfy-typo-wrap">


                <div class="categories-list">

                    <ul class="careerfy-row">
                        <!-- <h1> Heloo </h1> -->
                        @foreach($filter as $key => $loai)
                        <li class="careerfy-column-3">
                            <i class="{{$loai->class}}"></i>
                            <a href="{{URL ::to('/loai/'.$loai->id_loainganhnghe)}}">{{$loai->nganhnghe_name}}</a>
                            <span>{{$loai->count}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>


            </div>

        </div>
    </div>
    <!-- </div>
@yield('home') -->






</div>
@endsection