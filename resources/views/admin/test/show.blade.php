@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Show test</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
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
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                                <div class="small-box-footer">
                                    <a href="#" class="btn btn-success px-5">Invite <i class="fas fa-share-alt"></i></a>
                                    @if($test->user_id == auth()->id())
                                        <a href="{{route('admin.test.edit', $test)}}" class="btn btn-success px-5">Edit test <i class="fas fa-edit"></i></a>
                                    <form action="{{route('admin.test.delete', $test)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger px-5 mt-3">Delete test <i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
