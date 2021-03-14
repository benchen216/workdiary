@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <h5>客戶基本表單</h5>
                <form role="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">
                                    Email address
                                </label>
                                <input type="email" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">
                                    Email address
                                </label>
                                <input type="email" class="form-control" id="exampleInputEmail1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">

                        <label for="exampleInputPassword1">
                            Password
                        </label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">

                        <label for="exampleInputFile">
                            File input
                        </label>
                        <input type="file" class="form-control-file" id="exampleInputFile">
                        <p class="help-block">
                            Example block-level help text here.
                        </p>
                    </div>
                    <div class="checkbox">

                        <label>
                            <input type="checkbox"> Check me out
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
            <div class="col-md-1">
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Product
                        </th>
                        <th>
                            Payment Taken
                        </th>
                        <th>
                            Status
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customer as $customerx)
                        <tr>
                            <td>{{$customerx->index}}</td>
                            <td>{{$customerx["group"]}}</td>
                            <td>{{$customerx["name"]}}</td>
                            <td>{{$customerx["email"]}}</td>
                            <td>{{$customerx["phone"]}}</td>
                            <td><a href="xx{{$customerx["id"]}}">xxxx</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-1">
            </div>
        </div>

    </div>
@endsection
