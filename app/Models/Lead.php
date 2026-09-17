<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    public const STATUSES = [
        'nouveau' => 'Nouveau',
        'contacte' => 'Contacte',
        'visite' => 'Visite planifiee',
        'devis' => 'Devis envoye',
        'gagne' => 'Signe',
        'perdu' => 'Perdu',
    ];

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone',
        'postal_code', 'city',
        'profile', 'service', 'project_type', 'housing_type',
        'current_heating', 'deadline', 'message',
        'status', 'internal_note', 'contacted_at',
        'source', 'page', 'ip', 'user_agent', 'consent',
    ];

    protected function casts(): array
    {
        return [
            'consent' => 'boolean',
            'contacted_at' => 'datetime',
        ];
    }

    public function getFullNameAttribute(): string
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }

    public function getStatusLabelAttribute(): string
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }

    public function getServiceLabelAttribute(): ?string
    {
        if (! $this->service) {
            return null;
        }

        return config('services_catalog.' . $this->service . '.title', $this->service);
    }

    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        if (! $term) {
            return $query;
        }

        return $query->where(function (Builder $q) use ($term) {
            $like = '%' . $term . '%';
            $q->where('first_name', 'like', $like)
                ->orWhere('last_name', 'like', $like)
                ->orWhere('email', 'like', $like)
                ->orWhere('phone', 'like', $like)
                ->orWhere('city', 'like', $like)
                ->orWhere('postal_code', 'like', $like);
        });
    }

    public function scopeStatus(Builder $query, ?string $status): Builder
    {
        return $status ? $query->where('status', $status) : $query;
    }
}
