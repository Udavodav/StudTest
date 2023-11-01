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
                                        <textarea class="form-control" rows="3" maxlength="500" name="question[text]"
                                                  placeholder="Text"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
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
                                               placeholder="Number of point">
                                    </div>
                                    <div class="form-group">
                                        <label>Type question</label>
                                        <select name="question[type_id]" id="type_id" class="form-control">
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group" id="one">
                                        <div class="justify-content-between">
                                            <label>Answers</label>
                                            <button class="btn btn-warning mx-md-5" type="button"
                                                    onclick="onClickAddOnce()">Add option
                                            </button>
                                            <button class="btn btn-danger mx-md-2" type="button"
                                                    onclick="onClickDeleteLastOptionOnce()">Delete last option
                                            </button>
                                        </div>
                                        <table class="table table-bordered" id="tableOnce">
                                            <thead>
                                            <tr>
                                                <th>Text option</th>
                                                <th>Options</th>
                                            </tr>
                                            </thead>
                                            <tbody id='tableBodyOnce'>
                                            <div class="form-group">
                                                <tr id="tr0">
                                                    <td><textarea class="form-control" name="answers[0][text]" rows="2"
                                                                  maxlength="500"
                                                                  placeholder="Text option"></textarea>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio"
                                                                   id="radio0" value="0" name="is_right" checked>
                                                            <label for="radio0"
                                                                   class="custom-control-label">Correct?</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr id="tr1">
                                                    <td><textarea class="form-control" name="answers[1][text]" rows="2"
                                                                  maxlength="500"
                                                                  placeholder="Text option"></textarea></td>
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" type="radio"
                                                                   id="radio1" value="1" name="is_right">
                                                            <label for="radio1"
                                                                   class="custom-control-label">Correct?</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </div>
                                            </tbody>
                                        </table>

                                        <template id="templ_answer">
                                            <tr >
                                                <td><textarea class="form-control" name="name" rows="2" maxlength="500"
                                                              placeholder="Text option"></textarea>
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio"
                                                               id="radio" value="1" name="is_right">
                                                        <label for="radio" class="custom-control-label">Correct?</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </template>
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
