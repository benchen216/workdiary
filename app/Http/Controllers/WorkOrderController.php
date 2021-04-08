<?php

namespace App\Http\Controllers;

use App\Models\WorkItem;
use App\Models\WorkItemsClass;
use App\Models\WorkOrder;
use App\Models\WorkOrderItem;
use App\Models\WorkOrdersDetail;
use App\Models\User;
use App\Models\WorkOrderWorker;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    public function index()
    {
        $workorders = WorkOrder::all();
        return view("workorder.index",['workorders' => $workorders]);
    }

    public function store(){
        //$xxxx = request("myworker");
        //$xxxx = request("myitemclass");
        //$xxxx = request("myitem");
        //$xxxx = request("itemnum");
        //echo implode(" ",$xxxx);
        $workorders = new WorkOrder;
        //$workorders->w_id = request("worker_id");//request();
        $workorders->last_mod_id = request("last_mod_id");
        $workorders->w_name = request("w_name");
        //$workorders->name = request("name");
        //$workorders->phone = request("phone");
        //$workorders->city = 1;//request("city");
        $workorders->address = request("address");
        $workorders->start_time = request("starttime");
        //$workorders->extra_data = "{}";
        $workorders->is_finish = 0;
        //$workorders->finish_time = date("2020/1/2 12:10:0");
        $workorders->save();
        $work_workers = request("myworker");
        foreach($work_workers as $worker){
            $work_worker = new WorkOrderWorker;
            $work_worker->w_id = $workorders->id;
            $work_worker->worker_id = $worker;
            $work_worker->save();
        }
        $myitemclasses = request("myitemclass");
        $myitems = request("myitem");
        $munums = request("itemnum");
        for($x = 0 ; $x < count($myitemclasses); $x++){
            $work_item = new WorkOrderItem;
            $work_item->w_id = $workorders->id;
            $work_item->wi_class = $myitemclasses[$x];
            $work_item->wi = $myitems[$x];
            $work_item->num_before = $munums[$x];
            $work_item->save();
        }

        //$workitem = ;
        //$workorderdtails = new WorkOrdersDetail;
        /*$arr = [];
        $workorderdtails = new WorkOrdersDetail();
        $workorderdtails->work_id = $workorders->id;
        $workorderdtails->fill($arr);
        $workorderdtails->save();
        $xxxx = request("text");
        echo implode(" ",$xxxx);*/
        //error_log(strval($xxxx));
        //return strval($xxxx);
        return redirect("/workorders");
    }

    public function show($id){
        //$workorders = WorkOrder::where("name","=","ben")->get()[0];
        $workorders = WorkOrder::findOrFail($id);
        //$workorders = WorkOrder::all()[0];
        $workitemclassnames = WorkItemsClass::all();
        $workitemnames = WorkItem::all();
        $workitems = WorkOrderItem::where("w_id","=",$id)->get();
        $workworkers = WorkOrderWorker::where("w_id","=",$id)->get();
        //error_log(strval($workworkers));
        $my_user = User::all();
        return view("workorder.show")->with("workorders",$workorders)->with("users",$my_user)->with("workitems_o",$workitems)->with("workworkers_o",$workworkers)->with("workitems",$workitemnames)->with("workitem_classes",$workitemclassnames);
    }
    public function update($id){

    }
    public function edit($id){
        //$workorders = WorkOrder::where("name","=","ben")->get()[0];
        $workorders = WorkOrder::findOrFail($id);
        //$workorders = WorkOrder::all()[0];
        $my_col = WorkOrdersDetail::findOrFail(1);
        $my_col2 = WorkOrdersDetail::where("work_id","=",$id)->first();
        $my_user = User::all();
        return view("workorder.show")->with('workorders', $workorders)->with('work_detail',$my_col)->with('work_detail2',$my_col2)->with("edit",true)->with("users",$my_user);
    }

    public function destroy($id){
        $workorders = WorkOrder::findOrFail($id);
        $workitems = WorkOrderItem::where("w_id","=",$id)->get();
        $workworkers = WorkOrderWorker::where("w_id","=",$id)->get();
        foreach($workitems as $x){
            $x->delete();
        }
        foreach($workworkers as $x){
            $x->delete();
        }
        $workorders->delete();
        //$workitems->delete();
        //$workworkers->delete();
        //WorkOrder::where("id",$id)->update(["is_finish"=>0]);

        //$workorders->is_finish = 1;
        //$workorders->save();


        return redirect('/workorders');
    }
    public function col_def_save(){
        #$my_col = new WorkOrdersDetail;
        #$my_col->id = 1;
        #$my_col->save();
        $arr = [];
        for ($x = 0; $x <= 30; $x++) {
            $arr["col".strval($x)]=request("col".strval($x));
        }
        WorkOrdersDetail::where("id",1)->update($arr);

        return redirect('/work-col-def');
    }
    public function col_def(){

        $my_col = WorkOrdersDetail::findOrFail(1);
        return view('workorder.col_def',['work_detail' => $my_col]);
    }
    public function add(){
        $my_user = User::all();
        $workitem_classes = WorkItemsClass::all();
        $workitems = WorkItem::all();
        //$my_col = WorkOrdersDetail::findOrFail(1);
        return view("workorder.add")->with("users",$my_user)->with("workitems",$workitems)->with("workitem_classes",$workitem_classes);
    }

}
