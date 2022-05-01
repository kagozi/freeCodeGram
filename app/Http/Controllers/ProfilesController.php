<?php
namespace App\Http\Controllers;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
// use App\Http\Controllers\auth;

class ProfilesController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index(User $user)
    {
        // $user = User::findOrFail($user);

        // return view('profiles.index', [
        //     'user' => $user,
        // ]);

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30), 
            function () use($user) {
                return $user->posts->count();
        });

        // $postCount = $user->posts->count();
        // $followersCount = $user->profile->followers->count();
        // $followingCount = $user->following->count();

        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function() use($user) {
                return $user->profile->followers->count();
            });

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function() use($user){
                return $user->following->count();
            });

        return view('profiles.index', compact('user', 'follows', 'postCount', 'followingCount'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        

        if(request('image')){
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        // dd(array_merge(
        //     $data,
        //     ['image' => $imagePath]
        // ));

      
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/show/{$user->id}");
    }
}
