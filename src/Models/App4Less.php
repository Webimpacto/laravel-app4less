<?php

namespace Webimpacto\LaravelApp4Less\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $id_user
 * @property string $token
 * @property string $uuid
 * @property string $user_agent
 * @property boolean $active
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class App4Less extends Model
{
    protected $table = 'app4less';
}