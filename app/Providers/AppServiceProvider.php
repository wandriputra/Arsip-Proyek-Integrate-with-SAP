<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class AppServiceProvider extends ServiceProvider
{
    
    /**
     * @param  GateContract
     * @return [type]
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        
        /**
         * gate view-dokumen untuk secuirty
         * dokumen hanya dapat dilihat oleh
         * uploader
         * unit tujuan jika semua unit maka semua akan melihat
         * tembusan dokumen
         * 
         */
        $gate->define('view-dokumen', function ($user, $dokumen) {
            $boo = false;
            if($user->personil->unit_id === $dokumen->unit_asal || $user->personil->unit_id === $dokumen->unit_tujuan || $dokumen->unit_tujuan === 1){
                $boo = true;
            }
            foreach($dokumen->dokumen_tembusan as $tembusan){
                if ($user->personil->unit_id === $tembusan->unit_id) {
                    $boo = true;
                }
            }
            return $boo;
        });

        /**
         * 
         */
        $gate->define('upload-cek', function ($user, $role) {

            $array = ['admin', 'warehouse', 'afis', 'procurement', 'logistik', 'legal'];
            $boo = false;

//             $module =  $user->role_user->module_user;
// dd($module);
            // $module->contains('$role');
            foreach ($user->role_user->module_user as $key => $value) {
                if($value->nama_module === "upload_".$role){
                    $boo = true;
                }
            }
            return $boo;
        });
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
