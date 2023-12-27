@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Предоставить доступ</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="row">

                    <div class="w-100">
                        <div class="small-box" style="background: #{{dechex(rand(10000000,16777215))}}">
                            <div class="inner">
                                <h3>{{$test->title}}</h3>
                                <p>
                                    <ya-tr-span style="display: block; overflow: hidden; white-space: normal; text-overflow: ellipsis;"
                                                data-value="{{$test->description}}"
                                                data-type="trSpan">{{$test->description == null ? 'Без описания' : $test->description}}
                                    </ya-tr-span>
                                </p>
                                <p>
                                    <span data-index="26-0" data-ch="0"
                                          data-type="trSpan">Количество вопросов: {{$test->count_questions}}<br/></span>

                                    <span data-index="26-0" data-ch="0"
                                          data-type="trSpan">Автор: {{$test->user->name}}<br/></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="m-0">Кому предоставить доступ</h4>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список преподавателей</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Пользователь</th>
                                        <th>Почта</th>
                                        <th class="text-center">Кнопки</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
{{--                                                {{route('admin.access.create', [$user->id, $test->id])}}--}}
                                                <form method="POST" action="{{route('admin.access.create')}}">
                                                    @csrf
                                                    <input class="d-none" name="user_id" value="{{$user->id}}">
                                                    <input class="d-none" name="test_id" value="{{$test->id}}">
                                                    <button type="submit" class="btn btn-success" onclick="return confirm('Вы уверены?')">Поделиться</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-3 my-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
