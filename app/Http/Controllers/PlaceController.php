<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Thread;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('places.index', [
            'seoTitle' => 'Fylker her i Norge',
            'title' => 'Fylker',
            'places' => Place::where('type', '=', '1')->whereNull('parent_id')->orderBy('title', 'asc')->get(['title', 'slug']),

        ]);
    }

    public function municipality(Place $place, Category $category)
    {
        if (is_null($place->lat) || is_null($place->lon) || is_null($place->confidence)) {
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
            $response = Http::withHeaders([
                'domain' => 'her-i.no',
                'contact' => 'admin@her-i.no',
            ])
                ->withUserAgent($userAgent)
                ->acceptJson()
                ->get('https://geocode.xyz/' . $place->title . '?json=1');
            $obj = json_decode($response);

            if (isset($obj->standard->city) && $place->title == $obj->standard->city) {
                if (is_null($place->confidence) && isset($obj->standard->confidence)) {
                    $place->confidence = $obj->standard->confidence;
                }
                if (is_null($place->lat) && isset($obj->alt->loc[0]->latt)) {
                    $place->lat = $obj->alt->loc[0]->latt;
                }
                if (is_null($place->lon) && isset($obj->alt->loc[0]->longt)) {
                    $place->lon = $obj->alt->loc[0]->longt;
                }
            }
        }
        $place->hits += 1;
        $place->timestamps = false;
        $place->save();
        return view('places.municipality', [
            'seoTitle' => 'Her i ' . $place->title,
            'title' => $place->title,
            'place' => $place,
            'places' => Place::where(['parent_id' =>$place->id, 'type' => 3])->orderBy('title', 'asc')->get(['title', 'slug']),
            'forums' => Category::whereBelongsTo($place)->where('type', 2)->get(),
            'categories' => Category::whereBelongsTo($place)->where('type', 1)->get(),
            // 'companies' => Company::whereBelongsTo($place)->whereIn('org_form', ['AS', 'ENK'])->orderBy('hits', 'desc')->limit(12)->get(),
        ]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        $place->hits += 1;
        $place->timestamps = false;
        $place->save();
        return view('places.show', [
            'seoTitle' => 'Her i ' . $place->title,
            'title' => $place->title,
            'place' => $place,
            'places' => Place::where(['parent_id' =>$place->id, 'type' => 2])->orderBy('title', 'asc')->get(['title', 'slug']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        //
    }
}
