@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <h5>工作表單欄位</h5>
                <form role="form" action="{{route("workorder.col_def_save")}}" method="POST">
                    @csrf
                    @foreach(as)
                    @endforeach
                        <button type="submit" class="btn btn-primary">
                            儲存
                        </button>
                </form>
            </div>
            <div class="col-md-1">
            </div>
        </div>
    </div>
@endsection
