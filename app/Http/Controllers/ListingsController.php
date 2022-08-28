<?php

namespace App\Http\Controllers;

use App\Models\Listings;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\List_;

class ListingsController extends Controller
{
    public function index(Request $req)
    {
        // dd($req['tag']);
        $listings = Listings::latest()->filter(request(['tag', 'search']))->paginate(5);


        return view('listings.index', ['listings' => $listings]);
    }

    public function show($id)
    {
        $listing = Listings::findorfail($id);

        return view('listings.show', ['listing' => $listing]);
    }

    public function create()
    {

        return view('listings.create');
    }

    public function store(Request $req)
    {
        // dd($req->all());

        $formFields = $req->validate([
            'title' => 'required',
            'description' => 'required',
            'company' => 'required',
            'email' => 'email|required',
            'website' => 'required',
            'location' => 'required',
            'tags' => 'required',
        ]);

        $formFields['user_id'] =  auth()->user()->id;


        if ($req->hasFile('logo')) {
            $formFields['logo'] = $req->file('logo')->store('logos', 'public');
        }
        // dd($formFields['user_id']);

        // dd(auth()->user()->id);

        Listings::create($formFields);

        return redirect('/')->with('success', $formFields['email'] . ' created successfully');
    }

    public function manage()
    {
        $listing = Listings::where('user_id', '=', auth()->id())->get();

        return view('listings.manage', ['listings' => $listing]);
    }

    public function edit(Listings $listing)
    {
        return view('listings.edit', ['listings' => $listing]);
    }
}