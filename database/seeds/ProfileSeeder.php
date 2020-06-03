<?php

use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'profil_photo_path' => './storage/profile_pardefault.svg',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et dapibus ex, nec luctus nunc. Curabitur gravida purus justo, quis lacinia turpis efficitur eget. Morbi aliquam, lacus eu dignissim dignissim, neque nibh sollicitudin justo, ac convallis augue ligula ut felis. Maecenas accumsan lobortis aliquam. Nunc condimentum nec orci vel vehicula. Mauris consequat sed lectus non malesuada. Nunc efficitur ipsum suscipit, finibus lacus in, pharetra neque. Praesent nec nibh convallis libero sollicitudin convallis eu eu metus. Nunc et mi turpis. Proin iaculis sapien quis leo varius tincidunt. Sed volutpat lacus sed molestie pellentesque.',
            'jardine_depuis' => '2004',
            'tags_jardiniers' => 'Autosuffisant,Communautaire,Écologique',
            'fk_users_id' => 2,
        ]);
    }
}
