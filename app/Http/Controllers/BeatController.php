<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BeatController extends Controller
{
    public function getAllBeats()
    {
        return response()->json(Beat::with('genres')->get());
    }

    public function getLatestBeats()
    {
        return response()->json(Beat::latest()->take(10)->get());
    }

    public function getMostPreviewedBeats()
    {
        return response()->json(Beat::orderBy('views', 'desc')->take(10)->get());
    }

    public function searchBeats(Request $request)
    {
        $query = $request->input('query');
        
        $beats = Beat::where('title', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->orWhere('keywords', 'LIKE', "%$query%")
            ->orWhereHas('genres', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->with('genres')
            ->get();

        return response()->json($beats);
    }

    public function getHeroBeat()
    {
        return response()->json(Beat::inRandomOrder()->first());
    }

    public function show(Beat $beat)
{
    $relatedBeats = Beat::where('id', '!=', $beat->id)->whereHas('genres', function ($query) use ($beat) {
            $query->whereIn('genres.id', $beat->genres->pluck('id'));
        })
        ->inRandomOrder()
        ->take(4)
        ->get();

    $wishlistBeatIds = Auth::check() 
        ? Auth::user()->wishlist()->pluck('beat_id')->flip()
        : collect();
    // Attach inWishlist status to beats
    $relatedBeats = $this->attachWishlistStatus($relatedBeats);
    $isInWishlist = isset($wishlistBeatIds[$beat->id]);

    return view('beats.show', compact('beat', 'relatedBeats', 'isInWishlist'));
}
private function attachWishlistStatus($beats)
{
    if (Auth::check()) {
        // Fetch all wishlist beat IDs in one query
        $wishlistBeatIds = Auth::user()->wishlist()->pluck('beat_id')->flip();

        // Attach 'inWishlist' status to each beat
        $beats->transform(function ($beat) use ($wishlistBeatIds) {
            $beat->inWishlist = isset($wishlistBeatIds[$beat->id]);
            return $beat;
        });
    } else {
        // If user is not authenticated, set 'inWishlist' to false
        $beats->transform(function ($beat) {
            $beat->inWishlist = false;
            return $beat;
        });
    }

    return $beats;
}
    public function preview($filename)
    {
        $path = storage_path("app/private/beats/previews/{$filename}");
        // return response()->json($path);
        // Ensure the file exists
        if (!file_exists($path)) {
            abort(404);
        }
        // Return the file as a response
        return response()->file($path);
    }
}

