<?php

namespace App\Http\Controllers;

use App\Models\Todo as ModelsTodo;
use Illuminate\Http\Request;

class Todo extends Controller
{
    function addTodo(Request $request) {
       return ModelsTodo::insert($request->input());
    }
    function getTodo(Request $request) {
        return ModelsTodo::all();
    }

    function deleteTask(Request $request) {
        return ModelsTodo::where('id', $request->id)->delete();
    }

    function updateTask(Request $request, $id) {
        
       return ModelsTodo::where('id', $id)->update(['name' => $request->input('name')]);
         
    }
    function doneTask(Request $request, $id) {
        
       return ModelsTodo::where('id', $id)->update(['value' => $request->input('value')]);
         
    }
}
