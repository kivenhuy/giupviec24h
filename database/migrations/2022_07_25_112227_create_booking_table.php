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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('CustomerID');
            $table->string('MaidID');
            $table->string('PromotionID');
            $table->TIME('StartTime');
            $table->TIME('EndTime');
            $table->string('Total');
            $table->string('BookedDate');
            $table->string('RangeDate');
            $table->string('Note');
            $table->string('Address');
            $table->tinyInteger('Status')->default(1);
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
        Schema::dropIfExists('booking');
    }
};
