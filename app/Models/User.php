<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Check whether the user is a Super Admin.
     * Stored in SiteSetting 'super_admin_ids' (comma-separated ID list) or default to the first user (ID 1).
     */
    public function isSuperAdmin(): bool
    {
        $raw = SiteSetting::get('super_admin_ids', null);
        if ($raw === null) {
            return (int) $this->id === 1;
        }

        $ids = array_filter(array_map('trim', explode(',', (string) $raw)));
        if (empty($ids)) {
            return (int) $this->id === 1;
        }

        return in_array((string) $this->id, $ids, true);
    }

    /**
     * Get user role display name.
     */
    public function getRoleNameAttribute(): string
    {
        return $this->isSuperAdmin() ? 'Super Admin' : 'Admin';
    }

    /**
     * Set user's super admin status.
     */
    public function setSuperAdmin(bool $isSuper): void
    {
        $raw = SiteSetting::get('super_admin_ids', null);
        $ids = $raw === null ? [1] : array_filter(array_map('trim', explode(',', (string) $raw)));

        $strId = (string) $this->id;
        if ($isSuper) {
            if (!in_array($strId, $ids, true)) {
                $ids[] = $strId;
            }
        } else {
            $ids = array_values(array_filter($ids, fn ($id) => (string) $id !== $strId));
        }

        SiteSetting::set('super_admin_ids', implode(',', array_unique($ids)));
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
