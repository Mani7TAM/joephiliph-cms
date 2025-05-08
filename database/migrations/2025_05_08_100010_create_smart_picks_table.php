<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmartPicksTable extends Migration
{
    public function up()
    {
        Schema::create('smart_picks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('rating');
            $table->string('image')->nullable();
            $table->string('affiliate_link');
            $table->string('category');
            $table->unsignedBigInteger('view_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('smart_picks');
    }
}