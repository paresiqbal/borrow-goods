<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            // Explicitly set the engine to InnoDB
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('goods_code')->unique();
            $table->integer('stock')->default(0);
            $table->enum('status', ['Available', 'Borrowed'])->default('Available');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
