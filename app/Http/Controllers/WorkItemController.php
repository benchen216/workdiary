<?php

namespace App\Http\Controllers;
use App\Models\WorkItemsClass;
use App\Models\WorkItem;
use Illuminate\Http\Request;

class WorkItemController extends Controller
{
    public function index()
    {
        $workitem_classes = WorkItemsClass::all();
        $workitems = WorkItem::all();
        return view("workitem.index")->with("workitems",$workitems)->with("workitem_classes",$workitem_classes);
    }
    public function store()
    {   $workitem = new WorkItem;
        $workitem->wi_class = request("wi_class");
        $workitem->name = request("name");
        $workitem->save();
        return redirect(route("workitem.index"));
    }

    public function class_store()
    {
        $workitem_class = new WorkItemsClass;
        $workitem_class->name = request("name");
        $workitem_class->save();
        return redirect(route("workitem.class_show"));
    }

    public function class_show()
    {
        $workitem_classes = WorkItemsClass::all();
        return view("workitem.class")->with("workitem_classes",$workitem_classes);
    }


}
