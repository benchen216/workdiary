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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($workers as $worker)
                            <tr>
                                <td>{{$worker["id"]}}</td>
                                <td>{{$worker["w_name"]}}</td>
                                <td>{{$worker["name"]}}</td>
                                <td>{{$worker["w_id"]}}</td>
                                @if ($worker["is_finish"])
                                    <td><div class="text-success">完成</div></td>
                                @else
                                    <td><div class="text-danger">未完成</div></td>
                                @endif
                                <td>
                                    <form action="{{route('workorder.destroy', $workorder->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link btn-sm">刪除</button>
                                    </form>
                                </td>
                                <td><a href="{{route("workorder.show",$workorder->id)}}">編輯</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
