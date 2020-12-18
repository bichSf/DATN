<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const FOLDER_IMAGES_PROFILE = 'imagesProfileUser';

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isUser(): bool
    {
        return $this->getAttribute('role') == USER;
    }

    public function isAdmin(): bool
    {
        return $this->getAttribute('role') == ADMIN;
    }

    public function createUser($data)
    {
        if (isset($data['avatar'])) {
            dd($this->saveImageInFolder($data['avatar'], self::FOLDER_IMAGES_PROFILE));
        }
    }

    public function updateUser($data)
    {
        if (isset($data['avatar'])) {
            $this->saveImageInFolder($data['avatar'], self::FOLDER_IMAGES_PROFILE);
            $this->removeImagesInFolder('/public/' . self::FOLDER_IMAGES_PROFILE, $this->find($data['id'], true)->avatar);
        }
    }

    public function saveImageInFolder(UploadedFile $image, $folderName, $update = false, $imageName = null)
    {
        try {
            $imageName = $update ? $imageName : $image->hashName();
            Storage::disk('public')->put('/' . $folderName . '/', $image);
            return $imageName;
        } catch (\Exception $exception) {
            report($exception);
            return null;
        }
    }

    public function removeImagesInFolder($path, $filename)
    {
        if ($path && $filename) {
            Storage::delete($path . '/' . $filename);
        }
    }
}
