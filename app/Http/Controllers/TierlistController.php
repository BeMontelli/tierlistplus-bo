<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tierlist;
use Illuminate\Support\Facades\Auth;

class TierlistController extends Controller
{

    /**
     * INDEX *
     */
    public function index()
    {
        $tierlists = Tierlist::all();
        return view('tierlists.index',
            [
                'title' => __('Tierlists'),
                'description' => __('Full <i>Tierlists</i> listing'),
                'addTxt' => __('Create tierlist'),
                'noresults' => __('No Tierlist found'),
                'tierlists' => $tierlists
            ]
        );
    }

    /**
     * SHOW *
     */
    public function show($id)
    {
        $tierlist = Tierlist::find($id);
        return view('tierlists.show', compact('tierlist'));
    }

    /**
     * CREATE / STORE *
     */
    public function create()
    {
        return view('tierlists.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $tierlist = new Tierlist();
        $tierlist->title = $request->title;
        $tierlist->description = $request->description;
        $tierlist->user_id = Auth::id();
        $tierlist->save();

        return redirect()->route('tierlists.index')
            ->with('success', 'Tierlist created successfully.');
    }

    /**
     * EDIT / UPDATE *
     */
    public function edit($id)
    {
        $tierlist = Tierlist::find($id);
        return view('tierlists.edit', compact('tierlist'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);
        $tierlist = Tierlist::find($id);
        $tierlist->update($request->all());
        return redirect()->route('tierlists.index')
            ->with('success', 'Tierlist updated successfully.');
    }

    /**
     * DESTROY *
     */
    public function destroy($id)
    {
        $tierlist = Tierlist::find($id);
        $tierlist->delete();
        return redirect()->route('tierlists.index')
            ->with('success', 'Tierlist deleted successfully');
    }
}
