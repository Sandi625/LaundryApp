<?php

namespace App\Models;

use App\Enums\Role;
use App\Models\Concerns\ProfilePicture;
use App\Models\Concerns\UploadFile;
use App\Models\Contracts\UploadedFilesInterface;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

  
    
    

class User extends Authenticatable implements UploadedFilesInterface
{
    use HasApiTokens;

    use Notifiable, ProfilePicture;

    /**
     * The attributes that are mass assignable.
     *  Atribut yang dapat ditetapkan secara massal.
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'address',
        'phone_number',
        'profile_picture',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * Atribut yang harus disembunyikan untuk array.
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     * Atribut yang harus dilemparkan ke tipe asli.
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => Role::class,
    ];

    /**
     * Transaction relation
     * relasi ke transaksi
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'member_id');
    }

    /**
     * Vouchers relation
     * relasi ke voucher
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vouchers(): HasMany
    {
        return $this->hasMany(UserVoucher::class);
    }

    /**
     * Complaint suggestions relation
     * relasi ke saran dan komplain
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function complaint_suggestions(): HasMany
    {
        return $this->hasMany(ComplaintSuggestion::class);
    }

    /**
     * Return column name for storing file name
     * Kembalikan nama kolom untuk menyimpan nama file
     * @return string
     */
    public function fileColumn(): string
    {
        return 'profile_picture';
    }

    /**
     * File path for storing and getting uploaded file
     * Jalur file untuk menyimpan dan mendapatkan file yang diunggah
     * @return string
     */
    public function getFilePath(): string
    {
        return 'images';
    }

    /**
     * Get storage name
     * Dapatkan nama penyimpanan
     * @return string
     */
    public function getStorageName(): string
    {
        return 'public';
    }

    /**
     * Mutator for getting file asset path
     * Mutator untuk mendapatkan jalur aset file
     * @return string|null
     */
    public function getFileAsset(): ?string
    {
        if (!$this->hasFile() || $this->isDefaultFileName()) {
            return asset('img/profile/' . $this->getDefaultFileName());
        }

        return $this->getFileStorage()->url($this->getFullFilePath());
    }

    /**
     * Password mutator
     * Pengubah kata sandi

     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function password(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                if (blank($value)) return null;

                return Hash::needsRehash($value) ? Hash::make($value) : $value;
            }
        );
    }
}
