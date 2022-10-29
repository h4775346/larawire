<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole('super_admin') ? true : null;
        });

        $this->setupMacro();

    }

    private function setupMacro()
    {
        Response::macro('success', function ($message='process_done_successfully',$code='200') {
            return Response::make(['success' => true, 'message' => $message],$code);
        });
        Response::macro('success_data', function ($data=[],$code='200') {
            return Response::make(['success' => true, 'data' => $data],$code);
        });
        Response::macro('success_id', function ($message='process_done_successfully',$id=0,$code='200') {
            return Response::make(['success' => true, 'message' => $message,'id'=>$id],$code);
        });

        Response::macro('success_object', function ($data=[],$code='200') {
            return Response::make(array_merge(['success' => true],$data),$code);
        });


        Response::macro('fail', function ($message='something_went_wrong',$code=500) {
            return Response::make(['success' => false, 'message' => $message],$code);
        });
        Response::macro('validation', function ($errors=[],$code=403) {
            return Response::make(['success' => false, 'errors' => $errors],$code);
        });

    }
}
