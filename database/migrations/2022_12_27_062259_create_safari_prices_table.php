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
        Schema::create('safari_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_id')->index('idx_tour_id');
            $table->unsignedBigInteger('vehicle_id')->index('idx_vehicle_id');
            $table->decimal('amount');
            $table->string('label', 100)->default(null);
            $table->timestamp('created_at')->useCurrent()->index('idx_created_at');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->index('idx_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('safari_prices');
    }
};
