<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id(); // Primary key: auto-incrementing ID
            $table->foreignId('user_id') // Foreign key: references the users table
                  ->constrained()
                  ->onDelete('cascade'); // If a user is deleted, their cart will be deleted
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts'); // Drop the table if it exists
    }
}
