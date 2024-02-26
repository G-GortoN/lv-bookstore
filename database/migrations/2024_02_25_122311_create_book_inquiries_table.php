<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookInquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('book_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('phone');
            $table->string('email');
            $table->string('item_name');
            $table->date('pickup_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_inquiries');
    }
}