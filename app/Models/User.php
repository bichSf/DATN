<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

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
        'birthday',
        'gender',
        'phone',
        'address',
        'avatar',
        'department',
        'part',
        'branch',
        'role',
        'note',
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

    public function getAllUser()
    {
        $listUser = $this->where('role', USER)->get();
        return empty($listUser) ? [] : $listUser->toArray();
    }

    public function createUser($data)
    {
        try {
            if (isset($data['avatar'])) {
                $data['avatar'] = $this->saveImageInFolder($data['avatar'], self::FOLDER_IMAGES_PROFILE);
            }
            $data['password'] = Hash::make('12345678');
            $this->create($data);
            return true;
        } catch (Exception $exception) {
            report($exception);
            return false;
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
