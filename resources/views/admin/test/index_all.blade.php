@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Доступные тесты</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">

                <div class="row">

                    @if(isset($tests) && $tests != null)
                        @foreach($tests as $test)
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box" style="background: #{{dechex(rand(3000000,10000000))}}">
                                    <div class="inner">
                                        <h3>{{$test->title}}</h3>
                                        <p>
                                            <ya-tr-span data-index="26-0" data-translated="false" data-source-lang="en"
                                                        style="display: block; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; max-width: 40ch"
                                                        data-target-lang="ru" data-value="{{$test->description}}"
                                                        data-ch="0" data-type="trSpan">{{$test->description == null ? 'Без описания' : $test->description}}
                                            </ya-tr-span>
                                        </p>
                                    </div>
                                    @if($test->user_id == Auth::user()->id)
                                        <div class="small-box-footer">
                                            <a href="{{ route('admin.access.index', $test->id) }}" class="btn btn-success px-5">Поделиться <i class="fas fa-share-alt"></i></a>
                                        </div>
                                    @endif
                                    <a href="{{route('admin.test.show', $test)}}" class="stretched-link"></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    </div>

@endsection
