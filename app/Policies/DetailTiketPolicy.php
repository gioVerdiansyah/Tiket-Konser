<?php

namespace App\Policies;

use App\Models\Detail_tiket;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DetailTiketPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Semua pengguna diizinkan melihat daftar detail tiket
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Detail_tiket $detailTiket): bool
    {
        // Semua pengguna diizinkan melihat detail tiket
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Hanya pengguna yang terautentikasi yang diizinkan membuat detail tiket
        return $user->isAuthenticated();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Detail_tiket $detailTiket): bool
    {
        // Hanya pengguna yang memiliki peran admin yang diizinkan mengupdate detail tiket
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Detail_tiket $detailTiket): bool
    {
        // Hanya pengguna yang memiliki peran admin yang diizinkan menghapus detail tiket
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Detail_tiket $detailTiket): bool
    {
        // Hanya pengguna yang memiliki peran admin yang diizinkan mengembalikan detail tiket
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Detail_tiket $detailTiket): bool
    {
        // Hanya pengguna yang memiliki peran admin yang diizinkan menghapus permanen detail tiket
        return $user->hasRole('admin');
    }
}
