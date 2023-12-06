@extends('layouts.app')


@section('content')
    <h4 class="py-3  m-0"><span class="text-muted fw-light">Отзывы /</span> Все отзывы
    </h4>
    <div class="card">

        <div class="table-responsive col-xl-12">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Фото</th>
                        <th>Время</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slides as $slide)
                        <tr class="text-center">
                            <td>{{ $slide->id }}</td>
                            <td>{{ $slide->title }}</td>
                            <td>
                                <img src="{{ asset('images/' . $slide->image) }}" style="object-fit: contain" width="50px"
                                    height="50px" alt="Suwret tabilmadi">
                            </td>

                            <td>{{ date('d/m/Y', strtotime($slide->created_at)) }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-10 justify-content-center">

                                    <a href="{{ route('feedback.edit', $slide->id) }}"
                                        class="btn btn-warning btn-sm me-1"><i class="mdi mdi-file-edit-outline"></i></a>
                                    <form action="{{ route('feedback.destroy', ['feedback' => $slide]) }}" class="m-0"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#default"><i class="mdi mdi-delete"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

        </div>
    </div>
@endsection
