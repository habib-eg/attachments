<?php

namespace Habib\Attachment\Models;

use Habib\Attachment\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Habib\Attachment\Traits\AttachmentModelTrait;

class Attachment extends Model
{
    /**
     *
     */
    const ATTACHABLE = "attachable";
    /**
     *
     */
    const ATTACHMENT_ID = "attachment_id";

    use AttachmentModelTrait,UuidTrait;
}
