@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Creating question for test: {{$test->title}}</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-8">

                        <div class="card card-primary">

                            <form class="bg-white" action="{{route('admin.question.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body" id="body_question">
                                    <div class="form-group">
                                        <label>Text question</label>
                                        <textarea class="form-control" rows="3" maxlength="500" name="text"
                                                  placeholder="Text"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="path_image" class="custom-file-input">
                                                <label class="custom-file-label">Choose image</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="points">Number of point</label>
                                        <input type="number" name="score" class="form-control" id="points"
                                               placeholder="Number of point">
                                    </div>
                                    <div class="form-group">
                                        <label>Type question</label>
                                        <select name="type_id" id="type_id" class="form-control">
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @include('admin.question.answer.once_answer')
                                    @include('admin.question.answer.many_answer')
                                    <div class="form-group" id="three" style="display:none"><label>Без
                                            выбора</label></div>
                                    <div class="form-group" name="thor" id="thor" style="display:none"><label>Соответствие</label>
                                    </div>
                                    <div class="form-group" name="five" id="five" style="display:none">
                                        <label>Порядок</label>
                                    </div>
                                </div>
                                    <script src="{{asset('dist/js/question/change_answer_option.js')}}"></script>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary px-5">Add</button>
                                </div>
                                <div>

                                    @foreach($errors->all() as $error)
                                        <label>{{$error}}</label>
                                    @endforeach
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
