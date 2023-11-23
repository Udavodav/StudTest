@extends('client.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Taking the test</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Question {{'number'}}/{{'count'}}</h3>
                        </div>
                        <form action="#" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <span>Email address</span>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{'Next or complete'}}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
