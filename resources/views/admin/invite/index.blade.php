@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Предоставить доступ</h1>
                        <input class="d-none" id="route" value="{{ route('admin.invite.index', $test->id) }}">
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="row">

                    <div class="w-100">
                        <div class="small-box" style="background: #{{dechex(rand(10000000,16777215))}}">
                            <div class="inner">
                                <h3>{{$test->title}}</h3>
                                <p>
                                    <ya-tr-span
                                        style="display: block; overflow: hidden; white-space: normal; text-overflow: ellipsis;"
                                        data-value="{{$test->description}}"
                                        data-type="trSpan">{{$test->description == null ? 'Без описания' : $test->description}}
                                    </ya-tr-span>
                                </p>
                                <p>
                                    <span data-index="26-0" data-ch="0"
                                          data-type="trSpan">Количество вопросов: {{$test->count_questions}}<br/></span>

                                    <span data-index="26-0" data-ch="0"
                                          data-type="trSpan">Автор: {{$test->user->name}}<br/></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0">Предоставить тест</h4>
                    </div>
                </div>

                <form action="{{ route('admin.invite.store') }}" method="POST">
                    @csrf
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Настройки доступа</h3>
                        </div>
                        <div class="card-body">
                            <input class="d-none" name="test_id" value="{{$test->id}}">
                            <div class="form-group">
                                <label for="count_attempts">Количество попыток</label>
                                <input type="number" name="count_attempts" class="form-control" id="count_attempts"
                                       placeholder="Количество попыток" value="{{old('count_attempts')}}" max="100">
                                @error('count_attempts')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="count_minutes">Количество минут на прохождение</label>
                                <input type="number" name="count_minutes" class="form-control" id="count_minutes"
                                       placeholder="Количество минут" value="{{old('count_minutes')}}" max="180">
                                @error('count_minutes')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is_can_view"
                                           name="is_can_view"
                                           {{ old('is_can_view',0) == 1 ? 'checked' : '' }} value="1">
                                    <label class="custom-control-label" for="is_can_view">Может ли пользователь смотреть
                                        результаты с ответами</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mx-3 mb-3 col-sm-10 col-md-8 col-xl-6 col-10">
                            <label>Группа</label>
                            <select name="group_id" id="group_id" class="form-control">
                                <option value="-1"
                                    {{old('group_id', -1) == -1 ? 'selected' : ''}}
                                >Все
                                </option>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}"
                                        {{old('group_id',0)  == $group->id || (isset($data['group_id']) && $data['group_id'] == $group->id) ? 'selected' : ''}}
                                    >{{$group->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-2 col-md-3 col-sm-12 col-12">
                            <a type="button" id="route_button"
                               href="{{ route('admin.invite.index', [$test->id, 'group_id' => '-1']) }}"
                               class="btn btn-secondary mx-2 py-4">Выбрать</a>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="col-12">
                            @error('users')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Список пользователей</h3>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Пользователь</th>
                                            <th>Почта</th>
                                            <th>Группа</th>
                                            <th>Дата регистрации</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                               name="users[]"
                                                               id="check{{$loop->iteration}}" value="{{ $user->id }}">
                                                        <label for="check{{$loop->iteration}}"
                                                               class="custom-control-label">{{$loop->iteration}}</label>
                                                    </div>
                                                </td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->userGroup != null ? $user->userGroup->group->title : 'Пусто'}}</td>
                                                <td>{{$user->created_at}}</td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-2 col-md-4 col-sm-12 col-12">
                            <button type="submit"
                               class="btn btn-primary mx-lg-3 py-3 w-100">Предоставить</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-3 my-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
        <script>

            function changeSelect() {
                let refer = document.getElementById('route_button')
                refer.href = document.getElementById('route').value + '?group_id=' + document.getElementById('group_id').value;
            }

            document.getElementById('group_id').onchange = changeSelect;

        </script>
    </div>


@endsection
