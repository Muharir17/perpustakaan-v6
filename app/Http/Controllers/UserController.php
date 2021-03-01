<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Alert;

use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all(); // select * from user
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($request->all());  // insert into user values
        Alert::success('Success', 'Berhasil Menambahkan Data');

        // toast('Info Toast', 'info');
        return redirect()->route('users.index');
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
    public function edit(User $user) // binding 
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        Alert::success('Success', 'Data '. $user->name. ' Berhasil Mengedit  Data');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Alert::success('Success', 'Berhasil Menghapus Data');
        return redirect()->back();
    }

    public function dataTable(Request $request, Builder $builder)
    {
        if($request->ajax()){
            $user = User::with('member')->get();
            return DataTables::of($user)
            ->editColumn('action', function($user){
                return view('partials._action',[
                'model'     => $user,
                'form_url'  => route('users.destroy', $user->id),
                'edit_url'  => route('users.edit', $user->id),
                'confirm_message' => 'Yakin Mau Menghapus Data Ini ?']);

            })->make(true);
        }

        $html = $builder->columns([
            ['data' => 'name', 'name' => 'name', 'title' => 'Nama Lengkap'],
            ['data' => 'last_name', 'name' => 'last_name', 'title' => 'Nama terakhir'],
            ['data' => 'member.npm', 'name' => 'member.npm', 'title' => 'NPM'],
            ['data' => 'member.prodi', 'name' => 'member.prodi', 'title' => 'PRODI'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Aksi', 'orderable' => false, 'searchable' => 'false']
        ]);

        return view('user.datatable', compact('html'));
    }
}
