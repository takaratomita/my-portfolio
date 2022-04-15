<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasTable('works') ) {
            Schema::create('works', function (Blueprint $table) {
                $table->id();
                $table->string('title', 100);
                $table->text('content');
                $table->text('url');
                $table->text('git_url')->nullable();
                $table->longText('img')->nullable();
                $table->longText('img_sp')->nullable();
                $table->boolean('top_show');
                $table->enum('category', ['personal', 'company', 'friends']);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
