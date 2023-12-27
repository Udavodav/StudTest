@extends('client.layouts.main')

@section('content')

    <div class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Общая информация</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-8 col-12">
                        <!-- small box -->
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
                                                data-type="trSpan">Количество попыток: {{$invite->count_attempts}}<br/></span>

                                    <span data-index="26-0" data-ch="0"
                                                data-type="trSpan">
                                        Количество минут: {{$invite->count_minutes == 0 ? 'Без ограничения по времени' : $invite->count_minutes}}<br/></span>

                                    <span data-index="26-0" data-ch="0"
                                                data-type="trSpan">
                                        Доступно до - {{$invite->time_access == null ? 'Пока не закончатся попытки' : $invite->time_access}}<br/></span>
                                </p>
                            </div>
                        </div>
                        <a href="{{route('client.question.index', [$test, $invite])}}" class="btn btn-primary px-5">Начать тест</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
