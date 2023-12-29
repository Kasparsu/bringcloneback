<?php

use App\Models\Category;
use App\Models\Icon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Icon::class)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('item_templates');
    }
}
