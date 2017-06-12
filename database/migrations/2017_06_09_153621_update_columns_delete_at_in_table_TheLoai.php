<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsDeleteAtInTableTheLoai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theloai', function (Blueprint $table) {
//            $table->timestamp('deleted_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('theloai', function (Blueprint $table) {
//            $table->dropColumn('deleted_at');
            $table->dropSoftDeletes();
        });
    }
}
