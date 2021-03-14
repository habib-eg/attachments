<?php

use Habib\Attachment\Models\Attachment;

return [
    "uuid" => true,
    'user_id_column'=>'user_id',
    'model'=>Attachment::class,
    'attachable'=>Attachment::ATTACHABLE,
    'attachment_id'=>Attachment::ATTACHMENT_ID,

];
