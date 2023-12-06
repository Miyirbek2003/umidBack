@extends('layouts.app')

@push('body')
    <style>
        .form-hand {
            display: flex !important;
            gap: 15px !important;
        }
    </style>
@endpush

@section('content')
    <h4 class="py-3 m-0"><span class="text-muted fw-light">Слайдеры /</span> Добавить слайдер</h4>
    <h6 class="text-muted">Слайдер</h6>
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header p-0 col-lg">
                    <div class="nav-align-top">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link waves-effect active" role="tab"
                                    data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home"
                                    aria-selected="true">O'zbekcha</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link waves-effect" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-top-profile" aria-controls="navs-top-profile"
                                    aria-selected="false" tabindex="-1">Русский</button>
                            </li>

                            <span class="tab-slider" style="left: 0px; width: 91.1719px; bottom: 0px;"></span>
                        </ul>
                    </div>
                </div>
                <div class="card-body">

                    <form class="browser-default-validation needs-validation row form-hand" method="POST"
                        action="{{ route('slides.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content col-xl-9">
                            <div class="tab-pane fade active   show" id="navs-top-home" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <textarea class="form-control h-px-75" id="basic-default-bio" name='uz.[title]' placeholder="Mavzuni kiriting"
                                                rows="3">{{ old('uz_.title') }}</textarea>
                                            @error('uz_.title')
                                                <p class="help-block text-danger">{{ $message }}</p>
                                            @enderror
                                            <label for="basic-default-bio">Mavzu</label>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-floating form-floating-outline mb-4">
                                            <textarea class="form-control h-px-75" id="basic-default-bio" name='uz.[description]' placeholder="Tavsifini kiriting"
                                                rows="3">{{ old('uz_.description') }}</textarea>
                                            @error('uz_.description')
                                                <p class="help-block text-danger">{{ $message }}</p>
                                            @enderror
                                            <label for="basic-default-bio">Tavsifi</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <textarea class="form-control h-px-75" id="basic-default-bio" name='ru.[title]' placeholder="Тема" rows="3">{{ old('ru_.title') }}</textarea>
                                            @error('ru_.title')
                                                <p class="help-block text-danger">{{ $message }}</p>
                                            @enderror
                                            <label for="basic-default-bio">Тема</label>
                                        </div>
                                        <div class="form-floating form-floating-outline mb-4">
                                            <textarea class="form-control h-px-75" id="basic-default-bio" name='ru.[description]' placeholder="Описание"
                                                rows="3">{{ old('ru_.description') }}</textarea>
                                            @error('ru_.description')
                                                <p class="help-block text-danger">{{ $message }}</p>
                                            @enderror
                                            <label for="basic-default-bio">Описание</label>
                                        </div>




                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light">Добавить</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <h5 class="card-header">Выберите фото</h5>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Формат (.jpg, .jpeg, .png)</label>
                                    <input class="form-control" type="file" name="image" value="{{ old('image') }}"
                                        id="image" onchange="previewFile()" accept="image/png, image/gif, image/jpeg">

                                    @error('image')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <img src="{{ old('image') ? asset(old('image')) : asset('assets/img/no-image.jpg') }}"
                                class="form-control readonly" id="imageShow" class="img-uploaded mb-1" width="100%"
                                height="150px" style="object-fit: contain" alt="Suwret korinisi"
                                style="object-fit: contain" accept="image/png, image/gif, image/jpeg">
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection


@push('body')
    <script>
        $('.slide2').addClass('active');
    </script>
@endpush
