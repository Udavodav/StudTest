@extends('client.layouts.main')

@section('content')

    <div class="content">
        <section class="content">
            <div class="container-xxl">

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="m-0">Результаты тестирования: {{$result->invite->test->title}}</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div>

                </div>
            </div>
        </section>
    </div>

@endsection
