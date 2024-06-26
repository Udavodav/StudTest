@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Создание вопросов для теста: {{$test->title}}</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12 col-xl-10 col-12">

                        <div class="card card-primary">

                            <form class="bg-white" action="{{route('admin.question.store')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body" id="body_question">
                                    <input type="hidden" name="question[test_id]" value="{{$test->id}}">
                                    <div class="form-group">
                                        <label for="text">Текст вопроса</label>
                                        <textarea id="text" class="form-control" rows="3" maxlength="500" name="question[text]"
                                                  placeholder="Текст">{{old('question.text')}}</textarea>

                                        @error('question.text')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="path_image">Изображение</label>
                                        <div class="input-group" id="path_image">
                                            <div class="custom-file">
                                                <input type="file" name="question[path_image]" class="custom-file-input">
                                                <label class="custom-file-label">Выберите изображение</label>
                                            </div>
                                        </div>
                                        @error('question.path_image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="points">Количество баллов за вопрос</label>
                                        <input type="number" name="question[score]" class="form-control" id="points"
                                               placeholder="Количество баллов" value="{{old('question.score')}}" max="1000">
                                        @error('question.score')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Тип варианта ответа</label>
                                        <select name="question[type_id]" id="type_id" class="form-control">
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}"
                                                {{old('question.type_id',0) == $type->id ? 'selected' : ''}}
                                                >{{$type->title}}</option>
                                            @endforeach
                                        </select>
                                        @error('question.type_id')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @include('admin.question.answer.once_answer')
                                    @include('admin.question.answer.many_answer')
                                    @include('admin.question.answer.empty_answer')
                                    @include('admin.question.answer.order_answer')
                                    @include('admin.question.answer.comparison_answer')
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary px-5">Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

@endsection
