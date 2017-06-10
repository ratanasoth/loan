<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DepartmentController extends Controller
{
    // index action
    public function index()
    {
        $data['departments'] = DB::table('departments')->get();
        return view('backend.departments.index', $data);
    }
    // load create form
    public function create()
    {
        return view('backend.departments.create');
    }
}
