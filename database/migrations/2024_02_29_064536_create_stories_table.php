<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->string('s_name')->nullable();
            $table->string('s_orgin_name')->nullable();
            $table->string('s_slug')->nullable()->unique();
            $table->text('s_thumbnail')->nullable();
            
            $table->integer('s_type_id')->default(0);
            // $table->integer('s_author_id')->default(0);
            $table->foreignId('s_author_id')->index()->constrained()->cascadeOnDelete(); //khoa ngoai
            $table->integer('s_total_chapter')->default(0);
            $table->tinyInteger('s_status')->default(0);

            $table->text('s_description')->nullable();

            $table->integer('s_favourite')->default(0);
            $table->integer('vote_number')->default(0);
            $table->integer('vote_total')->default(0);
            $table->tinyInteger('s_hot')->default(0);

            $table->string('s_chapter_current')->nullable();
            $table->string('s_chapter_total')->nullable();

            $table->integer('s_view_total')->default(0);

            $table->integer('s_rating_count')->default(0); // Tong so nguoi danh gia
            $table->integer('s_rating_star')->default(0); // Tong so diem danh gia
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
        Schema::dropIfExists('stories');
    }
}
