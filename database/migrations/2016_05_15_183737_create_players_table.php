<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->string('steamid')->unique();
            $table->primary('steamid');
            $table->integer('communityvisibilitystate');
            $table->integer('profilestate');
            $table->string('personaname');
            $table->integer('lastlogoff');
            $table->integer('commentpermission');
            $table->string('profileurl');
            $table->string('avatar');
            $table->string('avatarmedium');
            $table->string('avatarfull');
            $table->integer('personastate');
            $table->string('realname');
            $table->string('primaryclanid');
            $table->timestamp('timecreated');
            $table->integer('personastateflags');
            $table->string('loccountrycode');
            $table->string('locstatecode');
            $table->integer('loccityid');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
