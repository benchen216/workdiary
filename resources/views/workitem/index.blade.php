@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <form role="form" action="{{route("workitem.store")}}" method="POST">
                    @csrf
                    @guest()

                    @else
                        <input type="hidden" name="last_mod_id" id="last_mod_id" value="{{ Auth::user()->id }}">
                    @endguest
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name">
                                    工項
                                </label>
                                <select class="form-control" id="wi_class" name="wi_class">
                                @foreach($workitem_classes as $workitem_class)
                                    <option value="{{$workitem_class["id"]}}">{{$workitem_class["name"]}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="name">
                                    工項
                                </label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="col-md-2">
                                <br><br>
                                <button type="submit" class="btn btn-primary">
                                    新增
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <h5>工項</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            工項分類
                        </th>
                        <th>
                            工項名稱
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($workitems as $workitem)
                        <tr>
                            <td>
                                {{$workitem_classes[$workitem["wi_class"]-1]["name"]}}
                            </td>
                            <td>
                                {{$workitem["name"]}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            <div class="col-md-1">
            </div>
        </div>

    </div>

@endsection
