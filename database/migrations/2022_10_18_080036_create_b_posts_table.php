<?php

use App\Models\B_Detail;
use App\Models\B_Tag;
use App\Models\User;
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
        Schema::create('b_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(User::class);
            $table->text('b__tag_id')->nullable();
            $table->foreignIdFor(B_Detail::class);
            $table->string('title');
            $table->string('slug');
            $table->string('media')->default('default');
            $table->longText('content');
            $table->enum('status', ['draft', 'public', 'private'])->default('draft');
            $table->bigInteger('visitor');
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
        Schema::dropIfExists('b_posts');
    }
};