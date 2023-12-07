@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Editing test</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-6 col-6">

                        <div class="card card-primary">

                            <form class="bg-white" action="{{route('admin.test.update', $test->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                               placeholder="Title" value="{{old('title','') == '' ? old('title') : $test->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="points">Number of point</label>
                                        <input type="number" name="question[score]" class="form-control" id="points"
                                               placeholder="Number of point"
                                               value="{{old('count_questions','') == '' ? old('count_questions') : $test->count_questions}}"
                                               max="1000">
                                        @error('count_questions')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="3" maxlength="250" name="description"
                                                  placeholder="Description">{{old('description','') == '' ? old('description') : $test->description}}</textarea>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
