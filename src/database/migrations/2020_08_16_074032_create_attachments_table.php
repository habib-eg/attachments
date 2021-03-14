<?php

use Habib\Attachment\Models\Attachment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {

            if (config('attachment.uuid', true)) {
                $table->uuid('id')->primary();
                $table->nullableUuidMorphs(Attachment::ATTACHABLE ?? 'attachable');
                $table->uuid(Attachment::ATTACHMENT_ID ?? 'attachment_id')->nullable();
            } else {
                $table->id();
                $table->nullableMorphs(Attachment::ATTACHABLE ?? 'attachable');
                $table->unsignedBigInteger(Attachment::ATTACHMENT_ID ?? 'attachment_id')->nullable();
            }

            if (config('user.uuid', true)) {
                $table->uuid(config('attachment.user_id_column','user_id'))->nullable();
            } else {
                $table->bigIncrements(config('attachment.user_id_column','user_id'))->nullable();
            }

            $table->string('file');
            $table->boolean('primary')->default(false);
            $table->string('thumbnail')->nullable();
            $table->string('group_by')->nullable();
            $table->string('file_type')->nullable();
            $table->softDeletesTz();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
}
