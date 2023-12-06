@extends('layouts.app')


@section('content')
    <h4 class="py-3  m-0"><span class="text-muted fw-light">Отзывы /</span> Изменить отзыв</h4>
    <h6 class="text-muted">Отзыв</h6>
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

                    <form class="browser-default-validation needs-validation row" method="POST"
                        action="{{ route('feedback.update', ['feedback' => $slide]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="tab-content  col-xl-9">
                            <div class="tab-pane fade active   show" id="navs-top-home" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <input type="text" class="form-control" name='uz.[title]'
                                                id="basic-default-fullname"
                                                value="{{ old('uz' . '.title') ? old('uz' . '.title') : ($slide->translate('uz') != null ? $slide->translate('uz')->title : '') }}"
                                                placeholder="Ism familiya">
                                            <label for="basic-default-fullname">Ism familiya</label>
                                        </div>
                                        <div class="form-floating form-floating-outline mb-4">
                                            <textarea type="text" class="form-control h-px-75" name='uz.[description]' id="basic-default-fullname"
                                                placeholder="Sharh">
                                                {{ old('uz' . '.description') ? old('uz' . '.description') : ($slide->translate('uz') != null ? $slide->translate('uz')->description : '') }}
                                            </textarea>
                                            <label for="basic-default-fullname">Sharh</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <input type="text" class="form-control" name='ru.[title]'
                                                id="basic-default-fullname"
                                                value="{{ old('ru' . '.title') ? old('ru' . '.title') : ($slide->translate('ru') != null ? $slide->translate('ru')->title : '') }}"
                                                placeholder="Фамилия имя">
                                            <label for="basic-default-fullname">Фамилия имя</label>
                                        </div>
                                        <div class="form-floating form-floating-outline mb-4">
                                            <textarea type="text" class="form-control h-px-75" name='ru.[description]' id="basic-default-fullname"
                                                placeholder="Отзыв">
                                                {{ old('ru' . '.description') ? old('ru' . '.description') : ($slide->translate('ru') != null ? $slide->translate('ru')->description : '') }}
                                        </textarea>
                                            <label for="basic-default-fullname">Отзыв</label>
                                        </div>




                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light">Изменить</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <h5 class="card-header">Выберите фото</h5>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Формат (.jpg, .jpeg, .png)</label>
                                    <input value="{{ asset(old('image') ? old('image') : 'images/' . $slide->image) }}"
                                        class="form-control" type="file" name="image" required id="image"
                                        onchange="previewFile()" accept="image/png, image/gif, image/jpeg">

                                </div>
                            </div>
                            <img src="{{ asset(old('images') ? old('images') : 'images/' . $slide->image) }}"
                                class="form-control readonly" id="imageShow" class="img-uploaded mb-1" width="100%"
                                style="object-fit: contain" height="150px" alt="Suwret korinisi"
                                accept="image/png, image/gif, image/jpeg">
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
