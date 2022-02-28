<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_options', function (Blueprint $table) {
            // Add two foreign keys as a primary key
            // $table->id();
            $table->unsignedBigInteger('meal_id');
            $table->unsignedBigInteger('option_id');
            $table->foreign('meal_id')
                ->references('id')
                ->on('meals')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('option_id')
                ->references('id')
                ->on('options')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->primary(['meal_id', 'option_id']);
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
        Schema::dropIfExists('meal__options');
    }
}
