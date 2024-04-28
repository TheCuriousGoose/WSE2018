<?php

use App\Models\Color;
use App\Models\DesignSymbol;
use App\Models\PreOrder;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pre_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PreOrder::class);
            $table->foreignIdFor(Product::class);
            $table->foreignIdFor(Color::class);
            $table->foreignIdFor(DesignSymbol::class);
            $table->integer('quantity');
            $table->decimal('price_at_order', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_order_items');
    }
};
