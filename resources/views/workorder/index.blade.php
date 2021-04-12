@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            流水號
                        </th>
                        <th>
                            案名
                        </th>
                        <th>
                            施工日期
                        </th>
                        <th>
                            狀態
                        </th>
                        <th>
                            操作
                        </th>
                        <th>
                            詳細
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($workorders as $workorder)
                        <tr>
                            <td>{{$workorder["id"]}}</td>
                            <td>{{$workorder["w_name"]}}</td>
                            <td>{{$workorder["start_time"]}}</td>
                            @if ($workorder["is_finish"])
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
            </div>
            <div class="col-md-1">
            </div>
        </div>

    </div>
@endsection
