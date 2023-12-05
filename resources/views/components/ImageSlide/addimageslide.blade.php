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
    <h4 class="py-3 m-0"><span class="text-muted fw-light">Работы /</span> Добавить фото</h4>
    <h6 class="text-muted">Фото</h6>
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">

                <div class="card-body">

                    <form class="browser-default-validation needs-validation row form-hand" method="POST"
                        action="{{ route('imageslide.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-xl-3">
                            <h5 class="card-header">Фото ДО</h5>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Формат (.jpg, .jpeg, .png)</label>
                                    <input class="form-control" type="file" name="image-do" value="{{ old('image') }}"
                                        id="image1" onchange="previewFileA()">
                                    @error('image-do')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <img src="{{ old('image') ? asset(old('image')) : asset('assets/img/no-image.jpg') }}"
                                class="form-control readonly" id="imageShow1" class="img-uploaded mb-1" width="100%"
                                height="150px" style="object-fit: contain" alt="Suwret korinisi" style="object-fit: contain"
                                accept="image/png, image/gif, image/jpeg">
                        </div>
                        <div class="col-xl-3">
                            <h5 class="card-header">Фото ПОСЛЕ</h5>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Формат (.jpg, .jpeg, .png)</label>
                                    <input class="form-control" type="file" name="image-posle"
                                        value="{{ old('image') }}" id="image2" onchange="previewFileB()">
                                    @error('image-posle')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <img src="{{ old('image') ? asset(old('image')) : asset('assets/img/no-image.jpg') }}"
                                class="form-control readonly" id="imageShow2" class="img-uploaded mb-1" width="100%"
                                height="150px" style="object-fit: contain" alt="Suwret korinisi" style="object-fit: contain"
                                accept="image/png, image/gif, image/jpeg">
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Добавить</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>
    <script>
        function previewFileA() {
            var preview = document.querySelector('#imageShow1');
            var file = document.getElementById('image1').files[0]
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }

        function previewFileB() {
            var preview = document.querySelector('#imageShow2');
            var file = document.getElementById('image2').files[0];
            var reader = new FileReader();


            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
    </script>
@endsection


@push('body')
    <script>
        $('.slide2').addClass('active');
    </script>
@endpush
