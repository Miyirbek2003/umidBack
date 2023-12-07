@extends('layouts.app')


@section('content')
    <h4 class="py-3  m-0"><span class="text-muted fw-light">Заявки /</span> Ожидающие заявки
    </h4>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Лечения</th>
                        <th>Клиент</th>
                        <th>Телефон</th>
                        <th>Время</th>
                        <th>Статус</th>
                        <th>Связить</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slides as $slide)
                        @if ($slide->status == '1')
                            <tr class="text-center">
                                <td>{{ $slide->id }}</td>
                                <td>{{ $treatment?->find($slide->treatment_id)?->title ? $treatment?->find($slide->treatment_id)?->title : 'На прием' }}
                                </td>
                                <td>
                                    {{ $slide->name }}
                                </td>
                                <td>
                                    {{ $slide->phone }}
                                </td>
                                <td>{{ date('d/m/Y', strtotime($slide->created_at)) }}</td>
                                <td>
                                    @if ($slide->status == '0')
                                        <span class="badge bg-success">Связано</span>
                                    @else
                                        <span class="badge bg-danger">Ожидание</span>
                                    @endif
                                </td>
                                <td>
                                    <form method="post" action="{{ route('order.update', ['order' => $slide->id]) }}">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-success w-px-50 p-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                                fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                                <path
                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z">
                                                </path>
                                            </svg>

                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endif
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
