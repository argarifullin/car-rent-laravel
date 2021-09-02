@extends('admin.layouts.layout')



@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Title</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <a href="{{route('report.manager.select')}}">
                            <div class="card-body">
                                Managers report
                            </div>
                        </a>
                        <hr>
                        <a href="{{route('report.pickpoint.select')}}">
                            <div class="card-body">
                                Pickpoints report
                            </div>
                        </a>
                        <hr>

                        <a href="{{route('report.car.select')}}">
                            <div class="card-body">
                                Cars report
                            </div>
                        </a>
                        <hr>
                        <a href="{{route('report.client.select')}}">
                            <div class="card-body">
                                Clients report
                            </div>
                        </a>
                        <hr>


                        <!-- /.card-body -->

                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection

