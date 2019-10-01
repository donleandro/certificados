<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;

class CustomResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
     protected $token;
    public function __construct($token)
    {
       $this->token = $token;
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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
      // dd($this);
        return (new MailMessage)
              ->subject('Recuperar contraseña ')
              ->greeting('Cordial Saludo')
              ->line('Está recibiendo este correo porque hizó una solicitud de recuperación de contraseña para su cuenta.')
              ->action('Recuperar contraseña', route('password.reset', $this->token))
              ->line('Si no realizó esta solicitud, no se requiere realizar ninguna otra acción.')
              ->salutation(' '. config('app.name'));
              // ->trouble-clicking('Recuperar contraseña', route('password.reset', $this->token));
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
