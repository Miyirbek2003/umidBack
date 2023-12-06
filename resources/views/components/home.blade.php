@extends('layouts.app')

@section('content')
    <div class="row gy-4">
        <div class="col-lg-3 col-sm-2 col-12 ">
            <a href="{{ route('slides.index') }}">
                <div class="card bg-primary">
                    <div class="card-header align-items-start pb-3">
                        <div>
                            <h2 class="fw-bolder text-white" style="display: flex; justify-content: space-between">
                                {{ $slide }}
                                <i style="text-align: end" class="menu-icon mdi mdi-play-box-outline"></i>
                            </h2>
                            <p class="card-text text-white">Количества слайдов</p>
                        </div>

                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ route('employees.index') }}">
                <div class="card bg-success">
                    <div class="card-header align-items-start pb-3">
                        <div>
                            <h2 class="fw-bolder text-white" style="display: flex; justify-content: space-between">
                                {{ $workers }}
                                <i class="menu-icon tf-icons mdi mdi-account-outline"></i>

                            </h2>
                            <p class="card-text text-white">Количества сотрудников</p>
                        </div>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ route('treatments.index') }}">
                <div class="card bg-warning">
                    <div class="card-header align-items-start pb-3">
                        <div>
                            <h2 class="fw-bolder text-white" style="display: flex; justify-content: space-between">
                                {{ $treatment }}
                                <i class="menu-icon tf-icons mdi mdi-cube-outline"></i>

                            </h2>
                            <p class="card-text text-white">Количества лечений</p>
                        </div>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ route('typetreatments.index') }}">
                <div class="card bg-info">
                    <div class="card-header align-items-start pb-3">
                        <div>
                            <h2 class="fw-bolder text-white" style="display: flex; justify-content: space-between">
                                {{ $typeTreat }}
                                <i class="menu-icon tf-icons mdi mdi-cube-outline"></i>

                            </h2>
                            <p class="card-text text-white">Количества тип лечений</p>
                        </div>

                    </div>
                </div>
            </a>
        </div>




        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ route('feedback.index') }}">
                <div class="card bg-success">
                    <div class="card-header align-items-start pb-3">
                        <div>
                            <h2 class="fw-bolder text-white" style="display: flex; justify-content: space-between">
                                {{ $feed }}
                                <i class="menu-icon tf-icons mdi mdi-comment-quote"></i>

                            </h2>
                            <p class="card-text text-white">Все отзывы</p>
                        </div>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ route('imageslide.index') }}">
                <div class="card bg-warning">
                    <div class="card-header align-items-start pb-3">
                        <div>
                            <h2 class="fw-bolder text-white" style="display: flex; justify-content: space-between">
                                {{ $imageSlide }}
                                <i class="menu-icon tf-icons mdi mdi-briefcase-outline"></i>

                            </h2>
                            <p class="card-text text-white">Количества работы</p>
                        </div>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <a href="{{ url('/order') }}">
                <div class="card bg-info">
                    <div class="card-header align-items-start pb-3">
                        <div>
                            <h2 class="fw-bolder text-white" style="display: flex; justify-content: space-between">
                                {{ $order }}
                                <i class="menu-icon tf-icons mdi mdi-format-align-bottom"></i>

                            </h2>
                            <p class="card-text text-white">Ожидающие заявки</p>
                        </div>

                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
