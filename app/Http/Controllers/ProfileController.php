<?php

namespace App\Http\Controllers;

use App\Profile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $userId)
    {
        $profile = new Profile();
        $profile->bio = $request->bio;
        $profile->jardine_depuis = $request->jardine_depuis;
        $profile->tags_jardiniers = $request->tags_jardiniers;
        $profile->user_id = $userId;
        $profile->est_actif = 1;

        // Nom de la photo
        // $imageData = $request->get('photo');
        $imageData = $_FILES['photo']['tmp_name'];

        /**
         * Store l'image originale
         */
        $imageOriginale = Image::make($imageData);
        $imgOgPath = 'storage/images/profile/';
        // Renomme l'image selon TIMESTAMP et ID UNIQUE + extension
        // $extension = explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
        $extension = $_FILES['photo']['name'];
        $extension = explode('.', $extension);
        $extension = array_slice($extension, -1)[0];
        $fileNameOriginale = Carbon::now()->timestamp . '_' . uniqid() . '.' . $extension;
        // $imageOriginale->save(public_path($imgOgPath).$fileNameOriginale);
        $imageOriginale->save(public_path('images/temp/').$fileNameOriginale);
        // Ajout à la base de données
        $profile->photo = '/'.$imgOgPath . $fileNameOriginale;

        /**
         * Store une image miniature
         */
        // Obtienr l'image et la redimentionne l'image en 210 x 210 px (card)
        $imageMiniature = Image::make($imageData)->fit(210, 210, null, 'center');
        $imgMiniPath = 'storage/images/profil/miniatures/';
        // Renomme l'image selon TIMESTAMP et ID UNIQUE + extension
        // $fileNameMiniature = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
        $extension = $_FILES['photo']['name'];
        $extension = explode('.', $extension);
        $extension = array_slice($extension, -1)[0];
        $fileNameMiniature = Carbon::now()->timestamp . '_' . uniqid() . '.' . $extension;
        // $imageMiniature->save(public_path($imgMiniPath).$fileNameMiniature);
        $imageMiniature->save(public_path('images/temp/').$fileNameMiniature);
        // Ajout à la base de données
        $profile->photo_mini = '/'.$imgMiniPath . $fileNameMiniature;


        $profile->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $profile = Profile::where('user_id', $userId)
                    ->select('profiles.*', 'users.first_name', 'users.last_name')
                    ->join('users', 'profiles.user_id', '=', 'users.id')
                    ->first();

        // Transforme les tags de String à Array
        $tags = $profile->tags_jardiniers;
        $tagsTmp = explode(',', $tags);
        $profile->tags_jardiniers = $tagsTmp;

        return $profile;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId)
    {
        $profile = Profile::where('user_id', $userId)->first();
        $profile->bio = $request->bio;
        $profile->jardine_depuis = $request->jardine_depuis;
        $profile->tags_jardiniers = $request->tags_jardiniers;

        // Si une nouvelle photo est uploadé, la traitée
        if($request->get('photo')) {
            // Nom de la photo
            $imageData = $request->get('photo');

            /**
             * Store l'image originale
             */
            $imageOriginale = Image::make($imageData);
            // Renomme l'image selon TIMESTAMP et ID UNIQUE + extension
            $fileNameOriginale = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
            $imageOriginale->save(public_path('storage/images/profile/').$fileNameOriginale);
            // Ajout à la base de données
            $profile->photo = './storage/images/plants/'.$fileNameOriginale;

            /**
             * Store une image miniature
             */
            // Obtienr l'image et la redimentionne l'image en 210 x 210 px (card)
            $imageMiniature = Image::make($imageData)->fit(210, 210, null, 'center');
            // Renomme l'image selon TIMESTAMP et ID UNIQUE + extension
            $fileNameMiniature = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
            $imageMiniature->save(public_path('storage/images/profile/miniatures/').$fileNameMiniature);
            // Ajout à la base de données
            $profile->photo_mini = './storage/images/profile/miniatures/'.$fileNameMiniature;
        }

        $profile->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile, $userId)
    {
        $potager = Potager::where('user_id', $userId)->first();
        $potager->destroy();
    }

    /**
     * Ajoute une visite simple au potager - peut être spammé !
     *
     * @param  \App\Profile  $profile
     * @param  $userId passé dans la route depuis Vue
     * @return \Illuminate\Http\Response
     */
    public function addvisit(Profile $profile, $userId)
    {
        $profile = Profile::where('user_id', $userId)->first();
        $profile->profile_visits++;
        $profile->save();
    }
}




