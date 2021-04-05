@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <h5>建立工作表單</h5>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                員工名
                            </th>
                            <th>
                                員工email （帳號）
                            </th>
                            <th>
                                員工權限
                            </th>
                            <th>
                                狀態
                            </th>
                            <th>
                                操作
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                @foreach($workers as $worker)
                        <form action="{{route('worker.update', $worker->id)}}" method="POST">
                            <div class="row">
                                <div class="col-md-2">
                                    <p>{{$worker["name"]}}</p>
                                </div>
                                <div class="col-md-3">
                                    <p>{{$worker["email"]}}</p>
                                </div>
                                <div class="col-md-2">
                                    <label for="user_id"></label>
                                    <select id="user_type" name="user_type">
                                        <option value="admin" @if($worker["user_type"]=="admin") selected @endif>管理員</option>
                                        <option value="user" @if($worker["user_type"]=="user") selected @endif>使用者</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="user_type"></label>
                                    <select id="user_type" name="user_type">
                                        <option value="1" class="text-success" @if($worker["is_job"]) selected @endif>在職</option>
                                        <option value="0" class="text-danger" @if(!$worker["is_job"]) selected @endif>離職</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    @csrf
                                    @method("PUT")

                                    <input type="submit" value="刪除">
                                    <button  class="btn btn-link btn-sm">儲存</button>
                                </div>
                            </div>
                        </form>

                @endforeach

                <form role="form" action="{{route("worker.add")}}" method="POST">
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
                        新增
                    </button>
                </form>
            </div>
            <div class="col-md-1">
            </div>
        </div>

    </div>

@endsection
