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
        <section class="content">
            <div class="container-fluid">

                <div class="row">

                    <div class="w-100">
                        <!-- small box -->
                        <div class="small-box" style="background: #{{dechex(rand(3000000,10000000))}}">
                            <div class="inner">
                                <h3>{{$test->title}}</h3>

                                <p>
                                    <ya-tr-span data-index="26-0" data-translated="false" data-source-lang="en"
                                                data-target-lang="ru" data-value="{{$test->description}}"
                                                data-ch="0" data-type="trSpan">{{$test->description}}</ya-tr-span>
                                </p>
                            </div>
                            <div class="small-box-footer">
                                <a href="{{ route('admin.invite.index', $test->id) }}" class="btn btn-success px-5 my-2">Предоставить для решения <i
                                        class="fas fa-clipboard-check"></i></a>
                                @if($test->user_id == auth()->id())
                                    <a href="{{ route('admin.access.index', $test->id) }}"
                                       class="btn btn-success px-5">Поделиться <i class="fas fa-share-alt"></i></a>
                                    <a href="{{route('admin.test.edit', $test)}}" class="btn btn-success px-5">Изменить
                                        <i class="fas fa-edit"></i></a>
                                    <form action="{{route('admin.test.delete', $test)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger px-5 mt-3">Удалить <i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                @endif
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
                        <h4 class="m-0">Вопросы</h4>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-sm-6">
                        <a href="{{route('admin.question.create', $test->id)}}" class="btn btn-success px-5">Добавить
                            вопрос</a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список вопросов</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="w-50">Текст</th>
                                        <th>Тип</th>
                                        <th>Баллы</th>
                                        <th colspan="2" class="text-center">Кнопки</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($questions as $question)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$question->text}}</td>
                                            <td>{{$question->type->title}}</td>
                                            <td>{{$question->score}}</td>
                                            {{--                                            <td>--}}
                                            {{--                                                    <a href="{{route('admin.question.edit', $question->id)}}" class="text-success mx-2"><i class="fas fa-edit"></i></a>--}}
                                            {{--                                            </td>--}}
                                            <td>
                                                <a href="{{route('admin.question.show', $question->id)}}"
                                                   class="text-success mx-2"><i class="fas fa-eye"></i></a>
                                            </td>
                                            <td>
                                                @if($test->user_id == auth()->id())
                                                    <form method="POST"
                                                          action="{{route('admin.question.delete', $question->id)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="text-danger ml-5 border-0 bg-transparent"
                                                                onclick="return confirm('Вы уверены?')">
                                                            <i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                @endif
                                            </td>
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
