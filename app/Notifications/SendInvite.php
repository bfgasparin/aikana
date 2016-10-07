<?php

namespace App\Notifications;

use App\Invite;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
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
                    ->line('Você está recebendo este email porque foi convidado para a festa de aniversário do Bruno que faremos. Eu (bruno), meu irmão e minha mãe gostaríamos de sua presença para comemorarmos mais um ano de alegria, saúde e boas companhias.  Nossa festa, como sempre, será muito animada e extrovertida.')
                    ->line('Preparamos várias surpresas pra você. Uma delas é o novo serviço de intereção Aikana.')
                    ->line('Preparamos várias surpresas pra você. Uma delas é o novo serviço Aikana.')
                    ->line('Se você está achando esse nome familiar, é porque ele surgiu da junção dos nomes da Aika e da Luna. Aikana.')
                    ->line('Clique no botão abaixo e faça o cadastro no serviço para conhecer melhor sobre Aikana.')
                    ->action('Conheça Aikana', url('/invite', $this->invite->token))
                    ->line('Caso você não se lembre, iremos comemorar o aniversário no dia 08/10, a partir das 19:00h. Mas pode chegar antes se quiser.')
                    ->line('O endereço todos já conhecem, mas não custa relembrar: Rua Doutor Argemiro Couto de Barros, 177 -Pirituba - São Paulo - SP')
                    ->line('Aguardamos a sua presença.!');
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
