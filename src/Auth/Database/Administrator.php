<?php

namespace Encore\Admin\Auth\Database;

use Encore\Admin\Traits\AdminBuilder;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

/**
 * Class Administrator.
 *
 * @property Role[] $roles
 */
class Administrator extends Model implements AuthenticatableContract
{
    use HasApiTokens, Authenticatable, AdminBuilder, HasPermissions, SoftDeletes;

    const CURRENCY_CODE = 'MXN';
    const LANGUAGE_ID = 'en';
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    const STATUS_ACTIVE = '1';
    const STATUS_INACTIVE = '2';
    const STATUS_ACTIVE_LABEL = 'Active';
    const STATUS_INACTIVE_LABEL = 'Inactive';
    const DELETED_AT = 'deleted';

    protected $dates = ['deleted'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['userName', 'password', 'firstName', 'avatar','lastName',
      'email','phoneNumber','address','country','currencyCode','languageId','statusId'];

    /**
     * Set the default currencyCode, languageId attributes
     * @param [array] $attributes [description]
     */
    protected $attributes = [
      'currencyCode' => self::CURRENCY_CODE,
      'languageId' => self::LANGUAGE_ID
    ];

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $connection = config('admin.database.connection') ?: config('database.default');

        $this->setConnection($connection);

        $this->setTable(config('admin.database.users_table'));

        parent::__construct($attributes);
    }

    /**
     * To get CurrencyCode Attribute
     * @param  [type] $value [description]
     * @return [string]        [currency code]
     */
    public function getCurrencyCodeAttribute($value)
    {
        return self::CURRENCY_CODE;
    }

    /**
     * To get LanguageId Attribute
     * @param  [type] $value [description]
     * @return [string]        [language id]
     */
    public function getLanguageIdAttribute($value)
    {
        return self::LANGUAGE_ID;
    }

    /**
     * To get Status array
     * @return [array] [status array]
     */
    public static function getStatus()
    {
        return[
          self::STATUS_ACTIVE => self::STATUS_ACTIVE_LABEL,
          self::STATUS_INACTIVE => self::STATUS_INACTIVE_LABEL,
        ];
    }
}
