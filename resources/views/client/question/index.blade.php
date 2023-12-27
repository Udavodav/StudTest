@extends('client.layouts.main')

@section('content')

    <div class="content">
        <section class="content">
            <div class="container-xxl">

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="m-0">Тестирование: {{$test->title}}</h1>
                                <input class="d-none" id="count_minutes" value="{{$invite->count_minutes}}"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <form action="{{route('client.question.store')}}" method="POST" class="col-lg-10 col-sm-12 mb-5">
                        @csrf
                        <input type="text" name="invite_id" class="d-none" value="{{$invite->id}}">
                        @foreach($questions->shuffle() as $question)
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Вопрос {{$loop->iteration}}</h3>
                                </div>
                                <div class="card-body">
                                    <input class="d-none" name="questions[{{$question->id}}][question_id]"
                                           value="{{$question->id}}">
                                    <input class="d-none" name="questions[{{$question->id}}][question_type]"
                                           value="{{$question->type_id}}">
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
                                        @include('client.question.templates.take_test.once_answer')
                                        @break
                                        @case(2)
                                        @include('client.question.templates.take_test.many_answer')
                                        @break
                                        @case(3)
                                        @include('client.question.templates.take_test.empty_answer')
                                        @break
                                        @case(4)
                                        @include('client.question.templates.take_test.order_answer')
                                        @break
                                        @case(5)
                                        @include('client.question.templates.take_test.comparison_answer')
                                        @break
                                    @endswitch
                                </div>
                            </div>
                        @endforeach
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-3">
                                <button type="submit" class="btn btn-primary mx-lg-3 py-3 w-100">Завершить тест</button>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </form>
                    <div class="col-lg-2 col-sm-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h6 class="card-title">Таймер</h6>
                            </div>
                            <div class="card-body">
                                <span class="text row ml-1">Тест завершиться через:</span>
                                <span class="text-xl row ml-1" id="customTimer"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="{{asset('dist/js/timer.js')}}"></script>
    </div>

@endsection
