@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <h5>建立工作表單</h5>
                <form role="form" action="{{route("workorder.update", $workorders->id)}}" method="POST">
                    @method('PUT')
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
                                <input type="text" class="form-control" name="w_name" id="w_name" value="{{$workorders["w_name"]}}">
                            </div>
                            <div class="col-md-4">
                                <label for="starttime">
                                    施工日期
                                </label>
                                <input type="datetime-local" name="starttime" id="starttime" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($workorders["start_time"])) }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="address">
                                    地址
                                </label>
                                <input type="address" class="form-control" id="address" name="address" value="{{$workorders["address"]}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="worker_id">
                                            負責師傅
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="button" value="增加人員" onclick="add_worker()" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="on_work">
                                            是否上工
                                        </label>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    function add_worker()
                                    {
                                        var elmnt = document.getElementById("workers");
                                        var myworker = elmnt.cloneNode(true);
                                        //console.log($(myworker).find("input:text").val());
                                        //$(myworker).find("input:text").val("0");
                                        //console.log($(myworker).find("input:text").val());
                                        //myworker.getElementById("myworker_id")[0].setAttribute("value","0");
                                        br   = document.createElement('br')
                                        //document.getElementById('worker_zone').appendChild(br)
                                        document.getElementById('worker_zone').appendChild(myworker)
                                        $(myworker).find("#myworker_id").attr("value","0");
                                    }
                                    function del_worker(el)
                                    {   $(el).parent().parent().parent().addClass("hideopt");
                                        $(el).parent().parent().parent().find('option:selected').remove();
                                        $(el).parent().parent().parent().find("#worker_id").append("<option value='0' selected ></option>");
                                        //$(el).parent().parent().parent().find("#worker_id").attr("value","0");
                                    }
                                </script>
                                <span id="worker_zone">
                                    @foreach($workworkers_o as $w)
                                        <div id="workers">
                                            <input type="text" hidden id="myworker_id" name="myworker_id[]" value="{{$w["id"]}}">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <select class="form-control" id="worker_id" name="myworker[]">

                                                    @foreach($users as $user)
                                                        <option value="{{$user["id"]}}" @if( $user["id"] == $w["worker_id"]) selected @endif>{{$user["name"]}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <select class="form-control" name="ison_work[]">
                                                    <option  @if ($w["on_work"]==1) selected @endif value="1">是</option>
                                                    <option  @if ($w["on_work"]==0) selected @endif value="0">否</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <svg onclick="del_worker(this)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
                                        $(mywork_item).find("#myitem_id").attr("value","0");
                                    }
                                    function fn_subcl(el){
                                        console.log($(el).val());
                                        var val = $(el).val();
                                        $(el).parent().parent().find("#wi").find("option").removeClass('hideopt');
                                        $(el).parent().parent().find("#wi").find("option").filter( ':not([data-category="' + val + '"])' ).addClass( 'hideopt');
                                    }
                                    function del_work_item(el){
                                        $(el).parent().parent().addClass("hideopt");
                                        $(el).parent().parent().removeClass("row");
                                        $(el).parent().parent().find('option:selected').remove();
                                        $(el).parent().parent().find("#wi_class").append("<option value='0' selected ></option>");
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
                                    @for( $i=0 ; $i < count($workitems_o) ; $i++)
                                        <div class="row" id="mywkitem">
                                            <input type="text" hidden id="myitem_id" name="myitem_id[]" value="{{$workitems_o[$i]["id"]}}">
                                        <div class="col-md-4">
                                            <select class="form-control" id="wi_class" name="myitemclass[]" onchange="fn_subcl(this)">
                                                @foreach($workitem_classes as $workitem_class)
                                                    <option value="{{$workitem_class["id"]}}" @if( $workitems_o[$i]["wi_class"] == $workitem_class["id"]) selected @endif>{{$workitem_class["name"]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                           <select class="form-control" id="wi" name="myitem[]">
                                                @foreach($workitems as $workitem)
                                                   <option data-category="{{$workitem["wi_class"]}}" value="{{$workitem["id"]}}" @if( $workitems_o[$i]["wi"] == $workitem["id"]) selected @endif>{{$workitem["name"]}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="itemnum[]" value="{{$workitems_o[$i]["num_before"]}}" >
                                        </div>
                                            <div class="col-md-1">
                                                    <svg onclick="del_work_item(this)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
                                                </div>
                                    </div>
                                    @endfor
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="control-label" for="is_finish">
                                完工與否
                            </label>
                            <select class="form-control" name="is_finish">
                                <option class="text-success" @if ($workorders["is_finish"]==1) selected @endif value="1">完成</option>
                                <option class="text-danger" @if ($workorders["is_finish"]==0) selected @endif value="0">未完成</option>
                            </select>
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
