<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->bigInteger('total')->default(0);
            $table->bigInteger('discount')->nullable();
            $table->bigInteger('paid')->default(0);
            $table->string('payment_method')->nullable();
            $table->string('receipt_number')->unique()->nullable();
        });
    }
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn(['total', 'discount', 'paid', 'payment_method', 'receipt_number']);
        });
    }
};
