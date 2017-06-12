<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Auth;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['positions'] = DB::table('positions')->get();
        return view("backend.positions.index", $data);
    }

    public function create()
    {
        return view("backend.positions.add");
    }

    public function save(Request $b)
    {

        $data = [
            'code' => $b->code,
            'name' => $b->name,
        ];
        $i = DB::table('positions')->insert($data);
        if(Auth::user()->language=="en")
        {
            $sms = "Data has been saved successfully.";
            $sms1 = "Could not save your data.";
        }
        else{
            $sms = "ទិន្នន័យត្រូវបានរក្សាទុកដោយជោគជ័យ។";
            $sms1 = "មិនអាចរក្សាទុកទិន្នន័យបានទេ សូមត្រួតពិនិត្យឡើងវិញ!";
        }
        if($i)
        {
            $b->session()->flash('sms', $sms);
            return redirect('/position/create');
        }
        else{
            $b->session()->flash('sms1', $sms1);
            return redirect('/position/create')->withInput();
        }
        return redirect('/position/create');
    }

    public function edit($id)
    {
        $data['positions'] = DB::table('positions')->where('positions.id', $id)->first();
        return view("backend.positions.edit", $data);
    }

    public  function update(Request $r)
    {
       $data = array(
            'code' => $r->code,
            'name' => $r->name,
        );
        $i = DB::table('positions')->where('id', $r->id)->update($data);
        if(Auth::user()->language=="en")
        {
            $sms = "Update has been saved successfully.";
            $sms1 = "Could not save your changes.";
        }
        else{
            $sms = "ការផ្លាស់ប្តូរត្រូវបានរក្សាទុកដោយជោគជ័យ។";
            $sms1 = "មិនអាចរក្សាការផ្លាស់ប្តូរបានទេ។ សូមត្រួតពិនិត្យឡើងវិញ!";
        }
        if($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/position/edit/'.$r->id);
        }
        else{
            $r->session()->flash('sms1', $sms1);
            return redirect('/position/edit/'.$r->id);
        }
        return redirect('/position');
    }

    public function delete($id)
    {
        $i = DB::table('positions')->where('id', $id)->delete();
        if(Auth::user()->language=="en")
        {
            Session::flash('sms', 'Data have been Deleted');
        }
        else{
            Session::flash('sms', 'ទិន្នន័យត្រូវបានលុបដោយជោគជ័យ');
        }   
        return redirect('/position');
    }
}
