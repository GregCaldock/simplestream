<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('timetable', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('programme_id');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['programme_id']);
            $table->foreign('programme_id')
                ->references('id')
                ->on('programmes')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('time_table');
    }
}
