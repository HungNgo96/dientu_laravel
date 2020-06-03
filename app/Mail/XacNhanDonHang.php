<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Donhang;
use Illuminate\Support\Facades\Auth;
class XacNhanDonHang extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $donhang,$user;
    public function __construct(Donhang $donhang)
    {
        $this->donhang= $donhang;
        $this->user = Auth::user();
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.mailthanhtoan')->subject('Xác nhận đã đặt hàng');
    }
}
