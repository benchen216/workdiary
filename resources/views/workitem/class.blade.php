@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <form role="form" action="{{route("workitem.class_store")}}" method="POST">
                    @csrf
                    @guest()

                    @else
                        <input type="hidden" name="last_mod_id" id="last_mod_id" value="{{ Auth::user()->id }}">
                    @endguest
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name">
                                    工項分類
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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($workitem_classes as $workitem_class)
                        <tr>
                            <td>
                                {{$workitem_class["name"]}}
                            </td>
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
