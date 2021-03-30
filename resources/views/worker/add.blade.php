@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <h5>建立工作表單</h5>
                <form role="form" action="{{route("workorder.store")}}" method="POST">
                    @csrf
                    @guest()

                    @else
                        <input type="hidden" name="last_mod_id" id="last_mod_id" value="{{ Auth::user()->id }}">
                    @endguest
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name">
                                    員工姓名
                                </label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="col-md-4">
                                <label for="email">
                                    員工email(帳號)
                                </label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="col-md-4">
                                <label for="password">
                                    員工密碼
                                </label>
                                <input type="text" class="form-control" id="password" name="password">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        提交
                    </button>
                </form>
            </div>
            <div class="col-md-1">
            </div>
        </div>

    </div>

@endsection
