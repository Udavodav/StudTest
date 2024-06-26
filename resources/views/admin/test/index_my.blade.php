@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Мои тесты</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="row mb-3">
                    <div class="col-lg-3 col-6">
                        <a href="{{route('admin.test.create')}}" class="btn btn-block btn-success btn-lg">Создать
                            тест</a>
                    </div>
                </div>

                <div class="row">

                    @foreach($tests as $test)
                        <div class="col-sm-10 col-lg-6 col-xl-4 col-12">
                            <!-- small box -->
                            <div class="small-box" style="background: #{{dechex(rand(3000000,10000000))}}">
                                <div class="inner">
                                    <h3 style="display: block; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{$test->title}}</h3>
                                    <p>
                                        <ya-tr-span data-index="26-0" data-translated="false" data-source-lang="en"
                                                    data-target-lang="ru" data-value="{{$test->description}}"
                                                    style="display: block; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; max-width: 40ch"
                                                    data-ch="0"
                                                    data-type="trSpan">{{$test->description == null ? 'Без описания' : $test->description}}
                                        </ya-tr-span>
                                    </p>
                                </div>
                                <div class="small-box-footer">
                                        <a href="{{ route('admin.access.index', $test->id) }}"
                                           class="btn btn-success px-5">Поделиться <i class="fas fa-share-alt"></i></a>

                                        <a href="{{ route('admin.invite.index', $test->id) }}" class="btn btn-success px-5 my-2">Предоставить для решения <i
                                                class="fas fa-clipboard-check"></i></a>
                                </div>
                                <a href="{{route('admin.test.show', $test)}}" class="stretched-link"></a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </div>

@endsection
