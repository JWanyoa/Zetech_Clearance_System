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
        Schema::create('records_offices', function (Blueprint $table) {
            $table->id('officer_id');
            $table->string('name');
            $table->string('title');
            /* For Creating Current Timestamp */
            $table->timestamp('created_at')->useCurrent();
            /* For Updating */
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records_offices');
    }
};
