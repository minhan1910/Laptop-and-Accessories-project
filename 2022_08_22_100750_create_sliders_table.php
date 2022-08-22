<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            
                $table->bigIncrements('id'); 
                $table->mediumText('heading');
                $table->mediumText('description')->nullable();
                $table->mediumText('link')->nullable();
                $table->mediumText('link_name')->nullable();
                $table->string('image');
                $table->tinyInteger('status')->default('0')->nullable();
               
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
};
