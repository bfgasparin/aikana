<?php

namespace App\Notifications;

use App\Invite;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SendInvite extends Notification
{

    protected $invite;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct(Invite $invite)
    {
        $this->invite = $invite;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hora da Festa!')
                    ->subject('Famíla Ferme Gasparin')
                    ->line('Você foi convidado para o aniversário do Bruno, Victor e Marta!')
                    ->action('Faça o cadastro dejá!', url('/invite', $this->invite->token))
                    ->line('Esperamos você lá!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->invite->toArray();
    }

}
