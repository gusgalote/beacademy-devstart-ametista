<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /** @var bool */
    public $incrementing = false;

    /** * @var string */
    protected $keyType = 'string';

    /** @var string */
    protected $table = 'addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'zip',
        'uf',
        'city',
        'street',
        'number',
        'neighborhood',
        'complement',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public static $createRules = [
        'zip' => [
            'required',
            'regex:(^[0-9]{5}-?[0-9]{3}$)',
        ],
        'uf' => [
            'required',
            'digits:2',
        ],
        'city' => ['required'],
        'street' => ['required'],
        'number' => ['nullable'],
        'neighborhood' => ['required'],
        'complement' => ['nullable'],
    ];

    public static $updateRules = [
        'zip' => [
            'required',
            'regex:(^[0-9]{5}-?[0-9]{3}$)',
        ],
        'uf' => [
            'required',
            'digits:2',
        ],
        'city' => ['required'],
        'street' => ['required'],
        'number' => ['nullable'],
        'neighborhood' => ['required'],
        'complement' => ['nullable'],
    ];
}