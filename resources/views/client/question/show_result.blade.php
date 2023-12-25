@extends('client.layouts.main')

@section('content')

    <div class="content">
        <section class="content">
            <div class="container-xxl">

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="m-0">Результаты тестирования: {{$test->title}}</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Общая информация</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group mx-3">
                                <h3>Максимальный балл: </h3>
                                <h3>Набранный балл: </h3>
                                <h3>Процент правильных ответов: </h3>
                                <h3>Время окончания: </h3>
                                <h3>Длительность: </h3>
                            </div>
                        </div>

                        @if($invite->is_can_view == 1)
                            @foreach($questions->shuffle() as $question)
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Вопрос {{$loop->iteration}}</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mx-3">
                                            <h3>{{$question->text}}</h3>
                                            @if(isset($question->path_image))
                                                <div class="w-25">
                                                    <img src="{{asset('storage/'.$question->path_image)}}"
                                                         class="w-50 ms-5">
                                                </div>
                                            @endif
                                        </div>
                                        @switch($question->type_id)
                                            @case(1)
                                            @include('client.question.templates.once_answer')
                                            @break
                                            @case(2)
                                            @include('client.question.templates.many_answer')
                                            @break
                                            @case(3)
                                            @include('client.question.templates.empty_answer')
                                            @break
                                            @case(4)
                                            @include('client.question.templates.order_answer')
                                            @break
                                            @case(5)
                                            @include('client.question.templates.comparison_answer')
                                            @break
                                        @endswitch
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-3">
                                <button type="submit" class="btn btn-primary mx-lg-3 py-3 w-100">Закончить обзор
                                </button>
                            </div>
                        </div>

                    </div><!-- /.container-fluid -->
                </div>
        </section>
        <!-- /.content -->
        <script src="{{asset('dist/js/timer.js')}}"></script>
    </div>
    <!-- /.content-wrapper -->

@endsection
