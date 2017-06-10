<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CompanyController extends Controller
{
    // load all companies from db
    public function index()
    {
        if(!Accessible::check_permission('company','l')) return redirect('nopermission');
        $data['companies'] = DB::table('companies')->paginate(12);
        return view("backend.companies.index", $data);
    }
    // get detail information of a company
    public function detail($id)
    {
        $company = DB::table('companies')->where('id', $id)->first();
        return view('backend.companies.detail', compact('company'));
    }
    // function to load company form
    public function create()
    {
        if(!Accessible::check_permission('company','i')) return redirect('nopermission');
        return view("backend.companies.create");
    }
    // save data to database
    public function save(Request $r)
    {
        if(!Accessible::check_permission('company','i')) return redirect('nopermission');
        // upload logo first
        $file_name ="";
        if($r->logo)
        {
            $file = $r->file('logo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'img/'; // usually in public folder
            $file->move($destinationPath, $file_name);

        }
        $data = array(
            'code' => $r->code,
            'name' => $r->name,
            'email' => $r->email,
            'phone' => $r->phone,
            'website' => $r->website,
            'address' => $r->address,
            'logo' => $file_name
        );
        $i = DB::table('companies')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', "ទិន្នន័យត្រូវបានរក្សាទុក​ដោយជោគជ័យ។");
            return redirect('/company/create');
        }
        else{
            $r->session()->flash('sms1', "ទិន្នន័យមិនអាចរក្សាទុកបានទេ។ សូមត្រួតពិនិត្យម្តងទៀត។");
            return redirect('/company/create')->withInput();
        }

    }
    // delete a company by its id
    public function delete($id)
    {
        if(!Accessible::check_permission('company','d')) return redirect('nopermission');
        DB::table('companies')->where('id', $id)->delete();
        return redirect('/company');
    }
}
