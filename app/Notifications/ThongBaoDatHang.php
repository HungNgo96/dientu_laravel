<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use App\User;
use App\Donhang;
use Carbon\Carbon;
class ThongBaoDatHang extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $donhang;
    public $user;
    public function __construct(Donhang $donhang,User $user)
    {
        $this->donhang = $donhang;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    
    public function toDatabase($notifiable)
    {

        return [
            
            'donhang' => $this->donhang,
            'user' =>$this->user,
            
        ];
    }
    public function toBroadcast($notifiable)
    {

        return new BroadcastMessage([
           
            'donhang' => $this->donhang,
            'user' =>$this->user,
            
        ]);
    }
}
