<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tierlist;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Str;

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
        $categories = Category::all();
        return view('tierlists.create',[
            "categories" => $categories
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:tierlists',
            'description' => 'nullable',
        ]);

        $slug = Tierlist::getUniqueSlug($request->slug);

        $tierlist = new Tierlist();
        $tierlist->title = $request->title;
        $tierlist->description = $request->description;
        $tierlist->user_id = Auth::id();
        $tierlist->slug = $slug;

        $tierlist->save();

        if(!empty($request->categories) && count($request->categories)) {
            foreach ($request->categories as $category) {
                $tierlist->categories()->attach(intval($category));
            }
        }

        return redirect()->route('tierlists.index')
            ->with('success', 'Tierlist created successfully.');
    }

    /**
     * EDIT / UPDATE *
     */
    public function edit($id)
    {
        $tierlist = Tierlist::find($id);
        $categories = Category::all();
        $idCategories = array_column($tierlist->categories->all(), 'id');

        return view('tierlists.edit', [
            "tierlist" => $tierlist,
            "categories" => $categories,
            "idCategories" => $idCategories
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:tierlists',
            'description' => 'nullable',
        ]);
        $req = $request->all();

        $tierlist = Tierlist::find($id);

        $slug = Tierlist::getUniqueSlug($request->slug);
        $req['slug'] = $slug;

        $tierlist->categories()->sync($request->categories);

        $tierlist->update($req);
        return redirect()->route('tierlists.index')
            ->with('success', 'Tierlist updated successfully.');
    }

    /**
     * DESTROY *
     */
    public function destroy($id)
    {
        $tierlist = Tierlist::find($id);

        $tierlist->categories()->detach();

        $tierlist->delete();
        return redirect()->route('tierlists.index')
            ->with('success', 'Tierlist deleted successfully');
    }
}
