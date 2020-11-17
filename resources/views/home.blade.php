@extends('home_layout')

@section('home_content')
<!-- Main Section -->

            <div class="careerfy-main-section">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 careerfy-typo-wrap">
                           
                            <!-- Categories -->
                            <div class="categories-list">

                                <ul class="careerfy-row">
                                    @foreach($loainganhnghe as $key => $loai)
                                    <li class="careerfy-column-3">
                                        <i class="careerfy-icon careerfy-engineer"></i>
                                        <a href="#">{{$loai->nganhnghe_name}}</a>
                                        <span>(15 Open Vacancies)</span>
                                    </li>
                                    @endforeach     
                                    </ul>
                            </div>
                          
                            <!-- Categories -->
                        </div>

                    </div>
                </div>
            </div>

            <!-- Main Section -->
                 <!-- Main Section -->
        

            
          

        </div>
        <!-- Main Content -->

@endsection
