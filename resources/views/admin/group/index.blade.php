@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Обзор теста</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="m-0">Группы</h4>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-sm-6">
                        <a href="{{ route('admin.group.create') }}" class="btn btn-success px-5">Добавить группу</a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список групп</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Название</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($groups as $group)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$group->title}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
