<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('url');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'https://assets.antwerpen.be/srv/assets/api/image/1647d484-a281-4a73-ae76-66be03e2e920/varen%20maagdenpalm.jpg/contentimage_banner'
                )
        );

        // video voor getuigenis 1 (artikel 3)
        DB::table('media')->insert(
            array(
                'type' => 'video',
                'url' => 'https://www.youtube.com/watch?v=TyZz8HQdjfs'
                )
        );

        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'https://assets.antwerpen.be/srv/assets/api/image/25c5470a-53eb-43be-b907-10b837bb435b/p15_sterilisatie_thinkstockPhotos-75627272.jpg/contentimage_banner'
                )
        );

        // foto voor getuigenis 2 (artikel 4)
        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'http://susta.be/userfiles/images/universiteitantwerpen/susta_ua_01.jpg'
                )
        );

        // 5 foto sight MAS
        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'http://www.femma.be/frontend/files/blog/images/source/uitstap-naar-het-mas.jpg'
            )
        );

        // 6 foto sight kathedraal
        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'https://denbeke.be/blog/wp-content/uploads/2015/04/Onze-Lieve-Vrouwekathedraal-Antwerpen.jpg'
            )
        );

        // 7 foto sight gate15
        DB::table('media')->insert(
            array(
                'type' => 'video',
                'url' => 'https://www.youtube.com/watch?v=73wfuYU0gaE'
            )
        );

        // 8 kdg logo
        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'https://www.kdg.be/doc/huisstijl/Logo_V_whitespace.png'
            )
        );

        // 9 ua logo
        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'https://upload.wikimedia.org/wikipedia/fr/thumb/9/92/Universit%C3%A9_d%27Anvers_%28logo%29.svg/1200px-Universit%C3%A9_d%27Anvers_%28logo%29.svg.png'
            )
        );

        // 10 ap logo
        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'http://www.medianetvlaanderen.be/wp-content/uploads/2016/09/logo_AP_basis.jpg'
            )
        );

        // 11 student met hoofdtelefoon voor artikel 1
        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'https://assets.antwerpen.be/srv/assets/api/image/26939626-d142-43fb-99b1-8d695e3fa0db/Study360-2016D-082web.jpg.jpg/gate15_banner_large'
            )
        );

        // 12 studenten voor artikel 2
        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'https://assets.antwerpen.be/srv/assets/api/image/d9bbc203-9e65-4c04-9cf1-7f726aeed076/GATE15-study360-2016B-056.jpg/gate15_banner_large'
            )
        );

        // 13 skyline met kraan voor artikel 5
        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'https://assets.antwerpen.be/srv/assets/api/image/f6112736-2a7c-4d87-886d-bba06d9543da/lez.jpg/gate15_banner_large'
            )
        );

        // 14 artistieke vormen voor artikel 6
        DB::table('media')->insert(
            array(
                'type' => 'image',
                'url' => 'https://assets.antwerpen.be/srv/assets/api/image/86a060c2-6fd0-4c8a-b1f9-45f1b420f60d/student%20guide.png/gate15_banner_large'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
