<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name'        => '分享',
                'description' => '多一份分享，多一点对猫咪的了解',
            ],
            [
                'name'        => '教程',
                'description' => '听说每一个合格的铲屎官，都会写几份合格的教程',
            ],
            [
                'name'        => '问答',
                'description' => '请保持友善，互帮互助，让猫咪健康陪伴左右',
            ],
            [
                'name'        => '公告',
                'description' => 'CatHouse 站点公共，发布重要公告',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
