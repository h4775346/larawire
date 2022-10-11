<?php


namespace App\Traits;


trait Sweety
{

    public function showToast($type, $msg)
    {
        $this->dispatchBrowserEvent('alert', [
            'type' => $type,
            'message' => $msg,
        ]);

    }

    public function showConfirm($type, $msg, $callback, $data = [])
    {
        $this->dispatchBrowserEvent('confirm', [
            'type' => 'warning',
            'message' => "Please Confirm This Process",
            'data' => $data,
            'callback' => $callback
        ]);

    }

}
