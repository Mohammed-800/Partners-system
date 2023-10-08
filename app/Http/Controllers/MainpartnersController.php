<?php

namespace App\Http\Controllers;

use App\Models\mainpartners;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MainpartnersController extends Controller
{
    /**
     * عرض قائمة الشركاء.
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mainpartners = mainpartners::all();
        $mainpartners = mainpartners::all();
        return view('mainpartners.mainpartners',compact('mainpartners'));
        // return view('mainpartners.mainpartners');

        // echo $mainpartners;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * تخزين شريك جديد.
     * 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $input=$request->all();
        $b_exists=mainpartners::where('name','=',$input['name'])->exists();
        if($b_exists){
            mainpartners()->flush('Error','خطأ الشريك موجد مسبقاً');
            return redirect('/mainpartners');

        }
        $validatedData = $request->validate([
            'name' => 'required|unique:mainpartners|max:255',
        ],[

            'name.required' =>'يرجي ادخال اسم الشريك',
            'name.unique' =>'اسم الشريك مسجل مسبقا',


        ]);

        mainpartners::create([
                'name' => $request->name,
                'email' => $request->email,
                'PhoneNumber' => $request->PhoneNumber,


                'desc' => $request->desc,
                'Created_by' => (Auth::user()->name),

            ]);
            session()->flash('Add', 'تم اضافة العميل بنجاح ');
            return redirect('/mainpartners');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mainpartners  $mainpartners
     * @return \Illuminate\Http\Response
     */
    public function show(mainpartners $mainpartners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mainpartners  $mainpartners
     * @return \Illuminate\Http\Response
     */
    public function edit(mainpartners $mainpartners)
    {
        //
    }

    /**
     * تحديث بيانات الشركاء.
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mainpartners  $mainpartners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'name' => 'required|max:255|unique:mainpartners,name,'.$id,
            'desc' => 'required',
        ],[

            'name.required' =>'يرجي ادخال اسم الشريك',
            'name.unique' =>'اسم الشريك مسجل مسبقا',
            'desc.required' =>'يرجي ادخال البيان',

        ]);

        $mainpartners = mainpartners::find($id);
        $mainpartners->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'PhoneNumber' => $request->phone,
            'email' => $request->email,

        ]);

        session()->flash('edit','تم تعديل الشريك بنجاج');
        return redirect('/mainpartners');
    }

    /**
     * حذف شريك.
     * 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mainpartners  $mainpartners
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        mainpartners::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/mainpartners');
        //
    }
}
