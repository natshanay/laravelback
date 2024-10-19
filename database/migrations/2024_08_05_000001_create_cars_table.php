<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Adjust size if needed
            $table->string('type'); // Adjust size if needed
            $table->unsignedBigInteger('model_id');
            $table->boolean('availability')->default(true); // 1 for available, 0 for not available
            $table->string('image')->nullable(); // Store the image path
            $table->foreign('model_id')->references('id')->on('car_models')->onDelete('cascade');
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
        Schema::dropIfExists('cars');
    }
}
