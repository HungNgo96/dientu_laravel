<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Builder;

use App\Sanpham;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layout.featured',function($view){
          
            $sanphamdecao = Sanpham::with('cauhinhmaytinh','cauhinhdienthoai','soluongsanpham','chitietkhuyenmai')->take(8)->orderBy('luotxem','desc')->get();
            
            $view->with('sanphamdecao',$sanphamdecao);
        });
        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (array_wrap($attributes) as $attribute) {
                    $query->when(
                        str_contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            [$relationName, $relationAttribute] = explode('.', $attribute);
        
                            $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                                $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
                            });
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                        }
                    );
                }
            });
        
            return $this;
        });
        //
        Validator::extend('image64', function ($attribute, $value, $parameters, $validator) {
            $type = explode('/', explode(':', substr($value, 0, strpos($value, ';')))[1])[1];
            if (in_array($type, $parameters)) {
                return true;
            }
            return false;
        });
    
        Validator::replacer('image64', function($message, $attribute, $rule, $parameters) {
            return str_replace(':values',join(",",$parameters),$message);
        });
        Validator::extend('recaptcha', 'App\Validators\Recaptcha@validate');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
