@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Editing question for test: {{$question->test->title}}</h1>
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

                            <form class="bg-white" action="{{route('admin.question.update', $question->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body" id="body_question">
                                    <div class="form-group">
                                        <label>Text question</label>
                                        <textarea class="form-control" rows="3" maxlength="500" name="question[text]"
                                                  placeholder="Text">{{isset($question->text) ? $question->text : ''}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="w-25">
                                            <img src="{{asset('storage/'.$question->path_image)}}" alt="No image" class="w-50">
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="question[path_image]" class="custom-file-input">
                                                <label class="custom-file-label">Choose image</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="points">Number of point</label>
                                        <input type="number" name="question[score]" class="form-control" id="points"
                                               placeholder="Number of point" value="{{isset($question->score) ? $question->score : ''}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Type question</label>
                                        <select name="question[type_id]" id="type_id" class="form-control">
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}"
                                                {{$type->id == $question->type_id ? 'selected' : ''}}
                                                >{{$type->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @include('admin.question.answer.once_answer')
                                    @include('admin.question.answer.many_answer')
                                    @include('admin.question.answer.empty_answer')
                                    @include('admin.question.answer.order_answer')
                                    @include('admin.question.answer.comparison_answer')
                                </div>
                                    <script src="{{asset('dist/js/question/change_answer_option.js')}}"></script>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary px-5">Update</button>
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