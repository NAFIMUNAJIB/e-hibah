<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['page_title'] = 'Users';
        $data['page'] = 'users';

        return view('admin.pages.users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['page_title'] = 'Create Users';
        $data['page'] = 'users';

        return view('admin.pages.users.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        try
        {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('admin.users.index')->with('success', 'Data stored successfully');
        }
        catch (\Exception $e)
        {
            return redirect()
            ->route('admin.users.create')
            ->withInput()
            ->withErrors(['error' => 'Unable to store the data : ' .$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $data['page_title'] = 'Users';
        $data['page'] = 'users';
        $data['row'] = User::find($id);

        return view('admin.pages.users.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $data['page_title'] = 'Users';
        $data['page'] = 'users';
        $data['row'] = User::find($id);

        return view('admin.pages.users.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        try
        {
            $user = User::find($id);

            $update = [
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'branch_id' => $request->branch_id,
            ];

            if ($request->password) {
                $update['password'] = Hash::make($request->password);
            }

            $user->update($update);

            return redirect()->route('admin.users.edit',['user' => $id])->with('success', 'Data updated successfully');
        }
        catch (\Exception $e)
        {
            return redirect()
            ->route('admin.users.edit',['user' => $id])
            ->withInput()
            ->withErrors(['error' => 'Unable to store the data : ' .$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            DB::beginTransaction();

            User::find($id)->delete();

            DB::commit();

            return response()->json(['message' => 'Data deleted successfully'], 200);
        }
        catch (\Exception $e)
        {
            DB::rollback();

            return response()->json(['error' => 'Unable to delete the data'], 500);
        }
    }

    public function datatable()
    {
        $data = User::orderBy('name','asc');

        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $routeEdit = route('admin.users.edit', ['user' => $row->id]); // Define the Show route
            $routeDetail = route('admin.users.show', ['user' => $row->id]); // Define the Show route

            $actionBtn = '<a href="' . $routeEdit . '" class="edit btn btn-sm btn-success" style="margin:2px">Edit</a> <a href="' . $routeDetail . '" class="edit btn btn-sm btn-info" style="margin:2px">Detail</a> <button class="delete btn btn-sm btn-danger" style="margin:2px">Hapus</button>';
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
