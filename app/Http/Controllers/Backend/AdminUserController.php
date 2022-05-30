<?php

namespace App\Http\Controllers\Backend;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminUser;
use App\Http\Requests\UpdateAdminUser;
use Yajra\Datatables\Datatables;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
//        $adminUser=AdminUser::all();
       return view('backend.admin_user.index');
    }

    // server side

    /**
     * @throws \Exception
     */
    // datatable server side
    public function ssd()
    {
        $data=AdminUser::query();
        return Datatables::of($data)
        ->addColumn('action',function($each){
            $edit_icon= '<a href=" '. route('admin.admin-user.edit',$each->id) .'" class="text-warning"> <i class="fas fa-edit"></i> </a>';
            $delete_icon='<a href="#" class="text-danger delete" data-id="'.$each->id.'"> <i class="fas fa-trash-alt"></i> </a>';

            return '<div class="action-icon">'. $edit_icon .$delete_icon .'</div>';
        })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.admin_user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminUser $request)
    {
         $admin_user=new AdminUser();
         $admin_user->name=$request->name;
         $admin_user->email=$request->email;
         $admin_user->phone=$request->phone;
         $admin_user->password=bcrypt($request->password);
         $admin_user->save();
         return redirect()->route('admin.admin-user.index')->with('create','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $admin_user=AdminUser::findorFail($id);
       return view('backend.admin_user.edit',compact('admin_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminUser $request,$id)
    {
        $admin_user=AdminUser::findorFail($id);
        $admin_user->name=$request->name;
        $admin_user->email=$request->email;
        $admin_user->phone=$request->phone;
        $admin_user->update();

        return redirect()->route('admin.admin-user.index')->with('update','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $admin_user = AdminUser::findOrFail($id);
        $admin_user->delete();
        return 'success';
    }
}
