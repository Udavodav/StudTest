@extends('client.layouts.main')

@section('content')

    <div class="content">
        <section class="content">
            <div class="container-xxl">

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="m-0">Результаты тестирования: {{$result->invite->test->title}}</h1>
                            </div>
                        </div>
                    </div>
                </div>


                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Общая информация</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group mx-3">
                                <h4>Максимальный балл: {{$result->max_points}}</h4>
                                <h4>Набранный балл: {{$resultQuestions->sum('score')}}</h4>
                                <h4>Процент правильных ответов: {{round($resultQuestions->sum('score')/$result->max_points, 2)}}%</h4>
                                <h4>Время окончания: {{$result->ended_at}}</h4>
                                <h4>Длительность: </h4>
                            </div>
                        </div>
                    </div>

                    @if($result->invite->is_can_view == 1)
                        @foreach($resultQuestions as $resQuestion)
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Вопрос {{$loop->iteration}}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mx-3">
                                        <h3>{{$resQuestion->question->text}}</h3>
                                        @isset($resQuestion->question->path_image)
                                            <div class="w-25">
                                                <img src="{{asset('storage/'.$resQuestion->question->path_image)}}"
                                                     class="w-50 ms-5">
                                            </div>
                                        @endisset
                                    </div>
                                    @switch($resQuestion->question->type_id)
                                        @case(1)
                                        @include('client.question.templates.show_result.once_answer')
                                        @break
                                        @case(2)
                                        @include('client.question.templates.show_result.many_answer')
                                        @break
                                        @case(3)
                                        @include('client.question.templates.show_result.empty_answer')
                                        @break
                                        @case(4)
                                        @include('client.question.templates.show_result.order_answer')
                                        @break
                                        @case(5)
                                        @include('client.question.templates.show_result.comparison_answer')
                                        @break
                                    @endswitch
                                </div>
                                <div class="card-footer">
                                    <div class="alert alert-info">
                                        <span class="text">Правильный ответ:</span>
                                        @switch($resQuestion->question->type_id)
                                        @case(1)@case(2)
                                            @foreach($resQuestion->question->answers->where('is_right', 1) as $answer)
                                            <span class="text"><br/>{{$answer->text}}</span>
                                            @endforeach
                                            @break
                                        @case(3)
                                            <span class="text"><br/>{{$resQuestion->question->answers->answer}}</span>
                                            @break
                                        @case(4)
                                            @foreach($resQuestion->question->answers as $answer)
                                                <span class="text"><br/>{{$loop->iteration}}. {{$answer->option2}}</span>
                                            @endforeach
                                            @break
                                        @case(5)
                                            @foreach($resQuestion->question->answers as $answer)
                                                <span class="text"><br/>[{{$answer->option1}}] - {{$answer->option2}}</span>
                                            @endforeach
                                            @break
                                        @endswitch
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-3">
                            <a type="button" href="{{route('client.test.index')}}" class="btn btn-primary mx-lg-3 py-3 w-100">На главную</a>
                        </div>
                    </div>
            </div>
        </section>
    </div>

@endsection
