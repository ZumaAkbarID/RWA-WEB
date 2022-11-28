<?php

use App\Models\B_Post;
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
        Schema::create('b_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(B_Post::class);
            $table->string('name');
            $table->string('email');
            $table->text('content');
            $table->enum('status', ['approved', 'pending', 'rejected'])->default('pending');
            $table->enum('repplied', ['yes', 'no'])->default('no');
            $table->text('reply_content')->nullable();
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
        Schema::dropIfExists('b_comments');
    }
};