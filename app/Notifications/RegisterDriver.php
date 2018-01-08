<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Action;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegisterDriver extends Notification
{
    use Queueable;

    protected $driver_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user_id)
    {
        $this->driver_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $accept_url = url('/user/' . $this->driver_id . '/details');
        return (new MailMessage)
            ->line('Hi Admin')
            ->line('There is new user want to become a driver in your system')
            ->action('Show user details', $accept_url)
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
