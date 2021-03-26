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
                                <label for="w_name">
                                    工程名稱
                                </label>
                                <input type="text" class="form-control" name="w_name" id="w_name">
                            </div>
                            <div class="col-md-4">
                                <label for="name">
                                    客戶名字
                                </label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="col-md-4">
                                <label for="phone">
                                    客戶電話
                                </label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="starttime">
                                    施工日期
                                </label>
                                <input type="datetime-local" name="starttime" id="starttime" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="email">
                                    客戶email (選填)
                                </label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="col-md-4">
                                <label for="line">
                                    客戶line (選填)
                                </label>
                                <input type="text" class="form-control" id="line" name="line">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="row">
                            <div class="col-md-8">
                                <label for="address">
                                    地址
                                </label>
                                <input type="address" class="form-control" id="address" name="address">
                            </div>
                            <div class="col-md-4">
                                <label for="worker_id">
                                    負責師傅
                                </label>
                                <!--
                                <input type="text" class="form-control" id="worker_id" name="worker_id">
                                -->
                                <select class="form-control" id="worker_id" name="worker_id">
                                    @foreach($users as $user)
                                        <option value="{{$user["id"]}}">{{$user["name"]}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        function add_text()
                        {
                            text = document.createElement('input')
                            text.setAttribute('name', 'text[]')
                            br   = document.createElement('br')
                            document.getElementById('text_zone').appendChild(br)
                            document.getElementById('text_zone').appendChild(text)
                        }
                    </script>
                    <input type="button" value="增加text" onclick="add_text()" />
                    <br />
                    <span id="text_zone">
<input type="text" name="text[]" id="text_0" />
</span>

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
