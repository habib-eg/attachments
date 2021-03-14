<?php


namespace Habib\Attachment\Traits;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Relations\MorphTo;

trait AttachmentModelTrait
{
    use Thumbnail;
    public function initializeAttachmentModelTrait()
    {
        $this->fillable=array_merge($this->fillable,["file", "group_by", "file_type", "attachable_id", "attachable_type", "user_id",'owner_type','owner_id']);
        $this->appends[] ='file_path';
    }

    /**
     * @return MorphTo
     */
    public function attachable() : MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @param Builder $builder
     * @param string $name
     * @return Builder
     */
    public function scopeGroupName(Builder $builder, string $name):Builder
    {
        return $builder->where('group_by', $name);
    }

    /**
     * @param Builder $builder
     * @param string $name
     * @return Builder
     */
    public function scopeLikeGroupName(Builder $builder, string $name):Builder
    {
        return $builder->where('group_by', 'like', '%' . $name . '%');
    }

    /**
     * @return string
     */
    public function getFilePathAttribute():string
    {
        return asset($this->file ?? $this->defaultFilePath());
    }

    /**
     * @return string
     */
    public function defaultFilePath():string
    {
        return 'default.png';
    }

    public function unlinkFile()
    {
        unlink(public_path($this->file));
    }
}
