<?php

namespace Spatie\QueryBuilder\Tests\TestClasses\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RelatedModel extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function testModel(): BelongsTo
    {
        return $this->belongsTo(TestModel::class);
    }

    public function nestedRelatedModels(): HasMany
    {
        return $this->hasMany(NestedRelatedModel::class);
    }

    public function scopeNamed(Builder $query, string $name): Builder
    {
        return $query->where('name', $name);
    }
}
