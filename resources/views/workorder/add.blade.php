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
                            <div class="col-md-8">
                                <label for="w_name">
                                    工程名稱
                                </label>
                                <input type="text" class="form-control" name="w_name" id="w_name">
                            </div>
                            <div class="col-md-4">
                                <label for="starttime">
                                    施工日期
                                </label>
                                <input type="datetime-local" name="starttime" id="starttime" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="address">
                                    地址
                                </label>
                                <input type="address" class="form-control" id="address" name="address">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="worker_id">
                                    負責師傅
                                </label>
                                <input type="button" value="增加人員" onclick="add_worker()" />
                                <script type="text/javascript">
                                    function add_worker()
                                    {
                                        var elmnt = document.getElementById("worker_id");
                                        var myworker = elmnt.cloneNode(true);
                                        br   = document.createElement('br')
                                        //document.getElementById('worker_zone').appendChild(br)
                                        document.getElementById('worker_zone').appendChild(myworker)
                                    }
                                </script>
                                <span id="worker_zone">
                                    <select class="form-control" id="worker_id" name="myworker[]">
                                        @foreach($users as $user)
                                            <option value="{{$user["id"]}}">{{$user["name"]}}</option>
                                        @endforeach
                                    </select>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="button" value="增加工項" onclick="add_work_item()" />
                                <script type="text/javascript">
                                    function add_work_item()
                                    {
                                        var elmnt = document.getElementById("mywkitem");
                                        var mywork_item = elmnt.cloneNode(true);
                                        //mywork_item.setAttribute();
                                        br   = document.createElement('br');
                                        var dddd = @json($workitems);
                                        //console.log($("body").html());
                                        //document.getElementById('work_item_zone').appendChild(br)
                                        document.getElementById('work_item_zone').appendChild(mywork_item);

                                    }
                                </script>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="work_item">
                                            工項分類
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="work_item">
                                            工項細項
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="work_item">
                                            數量
                                        </label>
                                    </div>
                                </div>
                                <span id="work_item_zone">
                                    <div class="row" id="mywkitem">
                                        <div class="col-md-4">
                                            <select class="form-control" id="wi_class" name="myitemclass[]">
                                                @foreach($workitem_classes as $workitem_class)
                                                    <option value="{{$workitem_class["id"]}}">{{$workitem_class["name"]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                           <select class="form-control" id="wi" name="myitem[]">
                                                @foreach($workitems as $workitem)
                                                   <option value="{{$workitem["id"]}}">{{$workitem["name"]}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="itemnum[]">
                                        </div>
                                    </div>
                                </span>
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
