@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Тесты</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">Результаты</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Пользователь</th>
                                    <th>Дата прохождения</th>
                                    <th>Максимальный балл</th>
                                    <th>Набранный балл</th>
                                    <th>В процентах</th>
                                    <th colspan="2" class="text-center">Кнопки</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $result)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$result->invite->user->name}}</td>
                                        <td>{{$result->ended_at}}</td>
                                        <td>{{$result->max_points}}</td>
                                        <td>{{round($result->questions->sum('score'), 2)}}</td>
                                        <td>{{$result->percent_of_right * 100}}%</td>
                                        <td>
                                            <a href="{{ route('admin.result.show', $result->id) }}"
                                               class="text-success mx-2"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-3 my-3">
                        {{ $results->links() }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2 col-md-4 col-sm-12 col-12">
                        <a type="button" href="{{route('admin.result.index')}}"
                           class="btn btn-primary mx-lg-3 py-3 w-100">К списку тестов</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
