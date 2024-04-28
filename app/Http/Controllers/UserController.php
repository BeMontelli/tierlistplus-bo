<?php

namespace App\Http\Controllers;

use App\Models\Tierlist;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->orderByDesc('id')->paginate(10);
        return view('users.index',
            [
                'title' => __('Users'),
                'description' => __('Full <i>Users</i> listing'),
                'users' => $users
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tierlist::where("user_id", $id)->delete();
        User::where('id', $id)->delete();

        return redirect()->route('users.index');
    }
}
