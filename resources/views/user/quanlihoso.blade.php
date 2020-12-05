@extends('home_layout')
@section('home_content')
<style>
    .inputfile {
        max-width: 80% !important;
        font-size: 1.25rem !important;
        /* 20px */
        font-weight: 700 !important;
        text-overflow: ellipsis;
        white-space: nowrap;
        cursor: pointer !important;
        display: inline-block;
        overflow: hidden !important;
        padding: 0.625rem 1.25rem;
        /* 10px 20px */
    }
</style>

<div class="careerfy-main-content">

    <!-- Main Section -->
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
                                <figcaption>



                                </figcaption>
                            </figure>

                            <ul>
                                <li><a href="{{URL::to('/thongtin-ungvien')}}"></i> Thông tin ứng viên</a></li>
                                <li><a href="{{URL::to('/cap-nhat-ung-vien')}}"> Cập nhật ứng viên</a></li>
                                <li class="active"><a href="{{URL::to('/quan-li-ho-so')}}"></i> Quản lí hồ sơ</a></li>
                                <li><a href="{{URL::to('/danh-sach-nop-don/'.$_SESSION['id'])}}"> Đã Apply</a></li>

                            </ul>
                        </div>
                    </div>
                </aside>


                <div class="careerfy-column-9">
                    <div class="careerfy-typo-wrap">
                        <div class="careerfy-employer-dasboard">
                            <div class="careerfy-employer-box-section">
                                <!-- Profile Title -->
                                <div class="careerfy-profile-title">
                                    <h2>QUẢN LÝ HỒ SƠ</h2>
                                </div>
                                <!-- Manage Jobs -->
                                <div class="careerfy-managejobs-list-wrap">
                                    <div class="careerfy-managejobs-list">
                                        <!-- Manage Jobs Header -->
                                        <div class="careerfy-table-layer careerfy-managejobs-thead">
                                            <div class="careerfy-table-row">
                                                <div class="careerfy-table-cell"><label>Tên CV</label></div>
                                                <div class="careerfy-table-cell"><label>Xem</label></div>
                                                <div class="careerfy-table-cell"><label>Mặc định</label></div>
                                                <div class="careerfy-table-cell"><label></label></div>

                                            </div>
                                        </div>
                                        <!-- Manage Jobs Body -->
                                        <form action="{{url::to('/edit-cv-default')}}" method="post">

                                            <div class="careerfy-table-layer careerfy-managejobs-tbody">
                                                {{csrf_field()}}
                                                @foreach($cv as $key => $cv)
                                                <div class="careerfy-table-row">
                                                    <div class="careerfy-table-cell">
                                                        <h6>{{$cv->tencv}}</h6>

                                                    </div>
                                                    <div class="careerfy-table-cell"><a href="{{$cv->link_cv}}" class="careerfy-managejobs-appli">Dowload</a></div>

                                                    <div class="careerfy-table-cell">
                                                        <div class="careerfy-managejobs-links">
                                                            <input type="radio" name="cv_default" value="{{$cv->id}}" <?php if ($cv->trangthai === 1) {
                                                                                                                            echo "checked";
                                                                                                                        } else {
                                                                                                                            echo "";
                                                                                                                        } ?> />


                                                        </div>
                                                    </div>
                                                    <div class="careerfy-table-cell">
                                                        <a href='{{URL ::to('/delcv/'.$cv->id)}}' class='jobsearch-savedjobs-links'><i class='fas fa-trash'></i></a>
                                                    </div>

                                                </div>

                                                @endforeach
                                                <div class="careerfy-table-row">
                                                    <div class="careerfy-table-cell"> </div>
                                                    <div class="careerfy-table-cell"> </div>
                                                    <div class="careerfy-table-cell">
                                                        <input type="submit" value="Lưu" class="btn btn-primary btn-sm" name="submit">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>



                                    </div>
                                </div>
                                <div class="careerfy-employer-box-section">
                                    <!-- Profile Title -->

                                    <form action="{{url::to('/quan-li-ho-so')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <li class="user-candidate-spec-field jobsearch-user-form-coltwo-full" style="list-style-type: none;">
                                            <div id="jobsearch-upload-cv-main3325812" class="jobsearch-upload-cv jobsearch-signup-upload-cv">
                                                <label>Bổ sung CV</label>
                                                <div class="jobsearch-drpzon-con jobsearch-drag-dropcustom">
                                                    <div class="dropzone">

                                                        <div class="fileContainerFileName" id="fileNameContainer3325812">
                                                            <div class="dz-message jobsearch-dropzone-template">

                                                                <!-- <span class="upload-icon-con"><i class="jobsearch-icon jobsearch-upload"></i></span> -->
                                                                <strong>Nhấn để tải tập tin</strong>
                                                                <div class="upload-inffo">Kích thước tối đa<span>(Max 10Mb)</span> <span class="uplod-info-and"></span> và chỉ cho phép các định dạng <span>(.doc, .docx, .pdf)</span></div>
                                                                <div class="upload-or-con"> Or </div>
                                                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                                    <input type="file" name="fileupload" id="fileupload" class="btn">
                                                                    <input type="submit" value="Lưu" class="btn btn-primary btn-sm" name="submit">
                                                                </div>



                                                            </div>
                                                            <!-- \\\ -->




                                                        </div>
                                                    </div>
                                                </div>
                                        </li>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="careerfy-column-9"> -->
<!-- <div class="careerfy-typo-wrap">
                        >
                  
                    </div>
                </div> -->
<!-- </div> -->
<!-- <a class="jobsearch-drpzon-btn"><i class="jobsearch-icon jobsearch-arrows-2"></i> Upload Resume </a>
            <input type="submit" class="jobsearch-drpzon-btn" value="Upload Resume" /> -->
<!-- <input type="file" id="cand_cv_filefield3325812" class="jobsearch-upload-btn" name="candidate_cv_file" /> -->
<!-- </div> -->
@endsection