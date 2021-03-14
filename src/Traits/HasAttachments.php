<?php


namespace Habib\Attachment\Traits;


use Habib\Attachment\Models\Attachment;
use Illuminate\Database\Eloquent\Builder;

trait HasAttachments
{

    public function attachments()
    {
        return $this->morphMany(config('attachment.model',Attachment::class),config('attachment.attachable',Attachment::ATTACHABLE))->where('deleted_at',null);
    }

    public function attachment()
    {
        return  $this->belogsTo(config('attachment.model',Attachment::class),config('attachment.attachable',Attachment::ATTACHMENT_ID))->where('deleted_at',null);
    }


}
