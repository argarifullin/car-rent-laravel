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

                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('pickpoint.store')}}">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="model">Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Enter address">
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Add pickpoint</button>
                                    </div>

                                </div>
                                <!-- /.card-body -->


                            </form>
                        </div>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

@endsection

