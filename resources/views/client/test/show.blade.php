@extends('client.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Access tests</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-6">
                        <!-- small box -->
                        <div class="small-box" style="background: #{{dechex(rand(10000000,16777215))}}">
                            <div class="inner">
                                <h3>{{$test->title}}</h3>
                                <p>
                                    <ya-tr-span style="display: block; overflow: hidden; white-space: normal; text-overflow: ellipsis;"
                                                data-value="{{$test->description}}"
                                                data-type="trSpan">{{$test->description == null ? 'Without description' : $test->description}}
                                    </ya-tr-span>
                                </p>
                                <p>
                                    <span data-index="26-0" data-ch="0"
                                                data-type="trSpan">Count questions: {{$test->count_questions}}<br/></span>

                                    <span data-index="26-0" data-ch="0"
                                                data-type="trSpan">Count attempts: {{$inviteInfo->count_attempts}}<br/></span>

                                    <span data-index="26-0" data-ch="0"
                                                data-type="trSpan">
                                        Count minutes: {{$inviteInfo->count_minutes == 0 ? 'Без ограничения по времени' : $inviteInfo->count_minutes}}<br/></span>

                                    <span data-index="26-0" data-ch="0"
                                                data-type="trSpan">
                                        Access until - {{$inviteInfo->time_access == null ? 'Пока не закончатся попытки' : $inviteInfo->time_access}}<br/></span>
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                        <a href="{{route('client.question.index', $test)}}" class="btn btn-primary px-5">Начать тест</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
