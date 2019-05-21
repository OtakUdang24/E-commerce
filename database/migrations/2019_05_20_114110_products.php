<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        
        Schema::create('products', function (Blueprint $table) {
            $table->string('code');
            $table->primary('code');
            $table->text('description');
            $table->integer('stock');
            $table->float('price', 8, 2);

            $table->unsignedBigInteger('category_id');
            
            $table->string('photo');
            
            $table->unsignedBigInteger('user_id');
            
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table)
        {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
