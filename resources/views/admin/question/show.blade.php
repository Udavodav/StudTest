@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Просмотр вопроса</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-primary mx-3">
            <div class="card-header">
                <h3 class="card-title">Вопрос {{$question->id}}</h3>
            </div>
            <div class="card-body">
                <div class="form-group mx-3">
                    <h3>{{$question->text}}</h3>
                    @isset($question->path_image)
                        <div class="w-25">
                            <img src="{{asset('storage/'.$question->path_image)}}"
                                 class="w-50 ms-5">
                        </div>
                    @endisset
                </div>
                @switch($question->type_id)
                    @case(1)
                    @include('admin.question.show_templates.once_answer')
                    @break
                    @case(2)
                    @include('admin.question.show_templates.many_answer')
                    @break
                    @case(3)
                    @include('admin.question.show_templates.empty_answer')
                    @break
                    @case(4)
                    @include('admin.question.show_templates.order_answer')
                    @break
                    @case(5)
                    @include('admin.question.show_templates.comparison_answer')
                    @break
                @endswitch
            </div>
        </div>
        <div class="row">
            <div class="col-xl-2 col-md-4 col-sm-12 col-12">
                <a type="button" href="{{ url()->previous() }}"
                   class="btn btn-primary mx-lg-3 py-3 w-100">Назад</a>
            </div>
        </div>
    </div>

@endsection
