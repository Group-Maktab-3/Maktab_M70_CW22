<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DummyNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // var_dump($notifiable);
        return (new MailMessage)
                    ->line('HI')
                    ->line('ddf'.$notifiable->name)
                    // ->outroLines('outroLines')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');


    }
    public function toDatabase($notifiable)
    {
        return [
            // 'invoice_id',
            // 'amount' => $this->invoice->amount,
            'user_id'=>$notifiable->id,
            'massage'=>'Welcome',
            'time'=>now(),
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
