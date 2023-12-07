@extends('layouts.app')


@section('content')
    <h4 class="py-3  m-0"><span class="text-muted fw-light">Заявки /</span> Связанные заявки
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slides as $slide)
                        @if ($slide->status == '0')
                            <tr class="text-center">
                                <td>{{ $slide->id }}</td>
                                <td>{{ $treatment?->find($slide->treatment_id)?->title ? $treatment?->find($slide->treatment_id)?->title : 'На прием' }}
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

                            </tr>
                        @endif
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
