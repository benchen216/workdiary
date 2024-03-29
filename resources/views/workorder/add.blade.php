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
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    function add_worker()
                                    {
                                        var elmnt = document.getElementById("workers");
                                        var myworker = elmnt.cloneNode(true);
                                        br   = document.createElement('br')
                                        //document.getElementById('worker_zone').appendChild(br)
                                        document.getElementById('worker_zone').appendChild(myworker)
                                    }
                                    function remove_worker(el) {
                                        $(el).parent().parent().parent().remove();
                                    };
                                </script>
                                <span id="worker_zone">
                                    <div id="workers">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <select class="form-control" id="worker_id" name="myworker[]">
                                                        @foreach($users as $user)
                                                            <option value="{{$user["id"]}}">{{$user["name"]}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <svg onclick="remove_worker(this)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
                                            </div>
                                        </div>

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
                                        //var dddd = @json($workitems);
                                        //console.log($("body").html());
                                        //document.getElementById('work_item_zone').appendChild(br)
                                        document.getElementById('work_item_zone').appendChild(mywork_item);

                                    }
                                    function fn_subcl(el){
                                        console.log($(el).val());
                                        var val = $(el).val();
                                        $(el).parent().parent().find("#wi").find("option").removeClass('hideopt');
                                        $(el).parent().parent().find("#wi").find("option").filter( ':not([data-category="' + val + '"])' ).addClass( 'hideopt');
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
                                            <select class="form-control" id="wi_class" name="myitemclass[]" onchange="fn_subcl(this)">
                                                <option disabled selected>---工項分類---</option>
                                                @foreach($workitem_classes as $workitem_class)
                                                    <option value="{{$workitem_class["id"]}}">{{$workitem_class["name"]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                           <select class="form-control" id="wi" name="myitem[]">
                                               <option disabled selected>---工項細項---</option>
                                                @foreach($workitems as $workitem)
                                                   <option data-category="{{$workitem["wi_class"]}}" value="{{$workitem["id"]}}">{{$workitem["name"]}}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                        <script type="text/javascript">
                                            function remove_item(el) {
                                                $(el).parent().parent().remove();
                                            };
                                        </script>
                                        <div class="col-md-3">
                                            <input type="text" name="itemnum[]">
                                        </div>
                                        <div class="col-md-1">
                                            <svg onclick="remove_item(this)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
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
