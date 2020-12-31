<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {   
        // $users = new User();
        // $users = $users->select('users.*');
        // $start = ($request->start) ? $request->start : 0;
        // $pageSize = ($request->length) ? $request->length : 10;

        // $items = $users->get();
        // $users->skip($start)->take($pageSize);
        // //return $items;
        
        // $recordsTotal = $users->count();
        // return DataTables::of($items)
        // ->with([
        //     "recordsTotal" => $recordsTotal,
        //     "recordsFiltered" => $recordsTotal
        // ])
        // ->rawColumns(['id','name'])
        // ->make(true);
        $users = User::all();
        return Datatables::of($users)->make();
        return $request->all();
        if (request()->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }else{
            return 'hola';
        }
    }
}
