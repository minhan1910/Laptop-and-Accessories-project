<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_actions', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('permission_id');

            $table->bigInteger('action_id');

            $table
                ->string('created_by')
                ->nullable();

            $table
                ->string('updated_by')
                ->nullable();

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
        Schema::table('permission_actions', function (Blueprint $table) {
            //
        });
    }
}