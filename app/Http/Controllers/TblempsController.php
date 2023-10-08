<?php

namespace App\Http\Controllers;

use App\Models\tblemps;
use App\Models\mainpartners;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class TblempsController extends Controller
{
    /**
     * عرض قائمة الموظفين.
     * 
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $mainpartners = mainpartners::all();
        $tblemps = tblemps::all();
        return view('tblemps.tblemps', compact('mainpartners','tblemps'));
    }

    /**
     * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * تخزين موظف جديد.
     * 
     * 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        tblemps::create([
            'emp_name' => $request->emp_name,
            'emp_email' => $request->emp_email,
            'emp_PhoneNumber' => $request->emp_PhoneNumber,


            'mainpartner_id' => $request->mainpartner_id,
            'emp_desc' => $request->emp_desc,
            'emp_Created_by'=> (Auth::user()->name)
        ]);
        session()->flash('Add', 'تم اضافة موظف بنجاح ');
        return redirect('/tblemps');

    }

    /**
     * 
     * 
     * Display the specified resource.
     *
     * @param  \App\Models\tblemps  $tblemps
     * @return \Illuminate\Http\Response
     */
    public function show(tblemps $tblemps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tblemps  $tblemps
     * @return \Illuminate\Http\Response
     */
    public function edit(tblemps $tblemps)
    {
        //
    }

    /**
     * تحديث بيانات الموظف.
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tblemps  $tblemps
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request)
    {
        $id = $request->id;
        $tblemps = tblemps::find($id);
        $tblemps->update([
            'emp_name' => $request->emp_name,
            'emp_desc' => $request->emp_desc,
            'emp_PhoneNumber' => $request->emp_PhoneNumber,
            'emp_email' => $request->emp_email,
            'mainpartner_id'=>$request->mainpartner_id,

        ]);

        session()->flash('edit','تم تعديل بيانات الموظف بنجاج');
        return redirect('/tblemps');

    }

    /**
     * حذف موظف.
     * 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tblemps  $tblemps
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        // echo $request->id;
        $id = $request->id;
        tblemps::find($id)->delete();
        session()->flash('delete','تم حذف الموظف بنجاح');
        return redirect('/tblemps');
        
    }

}
