<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('borrower_id')->constrained('users');
            $table->foreignId('good_id')->constrained('goods');
            $table->date('borrow_date');
            $table->date('return_date')->nullable();
            $table->enum('loan_status', ['Borrowed', 'Returned'])->default('Borrowed');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
