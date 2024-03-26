<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UrlController extends Controller
{
    public function index(): View
    {
        return view('url.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
           'original_url' => ['required', 'string']
        ], [
            'original_url.required' => 'The URL field is required.'
        ]);

        $url = Url::create([
            'user_id' => Auth::id(),
            'original_url' => $request->get('original_url'),
            'shortened_url' => Str::random(5)
        ]);

        return redirect()->route('url.show', ['key' => $url->shortened_url]);
    }

    public function show(string $key): View
    {
        $url = Url::where('shortened_url', $key)->first();

        return view('url.show', [
            'key' => url('s/'.$key),
            'original_url' => $url->original_url
        ]);
    }

    public function visit(string $key): RedirectResponse
    {
        $url = Url::where('shortened_url', $key)->first();
        if ($key) {
            return redirect()->to(url($url->original_url));
        }

        return back();
    }
}
