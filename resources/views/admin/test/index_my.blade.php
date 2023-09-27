@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">My tests</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row mb-3">
                    <div class="col-lg-3 col-6">
                        <a href="{{route('admin.test.create')}}" class="btn btn-block btn-success btn-lg">Create
                            test</a>
                    </div>
                </div>

                <div class="row">

                    @foreach($tests as $test)
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box" style="background: #{{dechex(rand(3000000,10000000))}}">
                                <div class="inner">
                                    <h3>{{$test->title}}</h3>
                                    <p>
                                        <ya-tr-span data-index="26-0" data-translated="false" data-source-lang="en"
                                                    data-target-lang="ru" data-value="{{$test->description}}"
                                                    style="display: block; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; max-width: 40ch"
                                                    data-ch="0"
                                                    data-type="trSpan">{{$test->description == null ? 'Without description' : $test->description}}
                                        </ya-tr-span>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <div class="small-box-footer">
                                    <a href="#" class="btn btn-success px-5">Invite <i class="fas fa-share-alt"></i></a>
                                </div>
                                <a href="{{route('admin.test.show', $test)}}" class="stretched-link"></a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
