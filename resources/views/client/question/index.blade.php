@extends('client.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content">
        <div class="row d-flex justify-content-center">
            <div class="col-8">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Taking the test</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">


                    <form action="#" method="POST">
                        @csrf

                        @foreach($questions as $question)
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Вопрос {{$loop->iteration}}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mx-3">
                                        <h3>{{$question->text}}</h3>
                                        @if(isset($question->path_image))
                                            <div class="w-25">
                                                <img src="{{asset('storage/'.$question->path_image)}}" class="w-50 ms-5">
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
                        <div class="row">
                            <button type="submit" class="btn btn-primary mx-lg-3 py-3 w-25">Завершить тест</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

@endsection
