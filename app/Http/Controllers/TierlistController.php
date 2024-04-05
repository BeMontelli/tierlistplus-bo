<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tierlist;

class TierlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tierlists = Tierlist::all();
        return view('tierlists.index',
            [
                'title' => __('Tierlists'),
                'description' => __('Full <i>Tierlists</i> listing'),
                'tierlists' => $tierlists
            ]
        );
    }
}
