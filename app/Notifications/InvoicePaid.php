<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class InvoicePaid extends Notification
{
    //use Queueable;
    use Notifiable;

    protected $data;

    /**
     * Create a new notification instance.
     *
     * @param array $arr
     */
    public function __construct(array $arr)
    {
        $this->data = $arr;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        //$url = url('/invoice/' . $this->invoice->id);
        $text = $notifiable->username . ' members can apply for a deposit of '. $this->data['deposit_amount'] .' points.';

        return TelegramMessage::create()->to($notifiable->telegram_id)->content($text);
            // Optional recipient user id.
            //->to($notifiable->telegram_id)
            // Markdown supported.
            //->content("Hello there!\nYour invoice has been *PAID*");

            // (Optional) Blade template for the content.
            // ->view('notification', ['url' => $url])

            // (Optional) Inline Buttons
            //->button('View Invoice', $url)
            //->button('Download Invoice', $url);
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
