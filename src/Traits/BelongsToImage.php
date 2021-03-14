<?php


namespace Habib\Attachment\Traits;


use Habib\Attachment\Models\Attachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Trait BelongsToImage
 * @package Habib\Attachment\Traits
 */
trait BelongsToImage
{
    /**
     * @var string
     */
//    public static $imageName = 'image_id';
    /**
     * @var bool
     */
    public static $imageThumbnailAuto = true;

    /**
     * @return string
     */
    public static function ImageField(): string
    {
        return static::$imageName;
    }

    protected static function bootBelongsToImage(): void
    {
        if (static::$imageThumbnailAuto) {
            static::created(function (Model $model) {
//                $model->makeThumbnail(static::ImageField());
            });
        }
    }

    public function initializeBelongsToImage(): void
    {
        if (static::$imageThumbnailAuto) {
            $this->with[] = static::ImageField();
        }
    }

    /**
     * @return BelongsTo
     */
    public function image(): BelongsTo
    {
        return $this->belongsTo(Attachment::class, static::ImageField());
    }
}
