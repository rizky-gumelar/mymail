<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormSubmitted extends Mailable
{
    use SerializesModels;

    public $data;

    /**
     * Buat instance dari pesan email.
     *
     * @param  array  $data
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->markdown('emails.forms.submitted')
            ->with([
                'name' => $this->data['name'],
                'email' => $this->data['email'],
                'message' => $this->data['message'],
            ])
            // Menggunakan email pengirim dari request
            // ->from($this->data['email'], $this->data['name']);
            ->from('no-reply@linkup.my.id', 'LinkUp')

            // Menambahkan alamat reply-to berdasarkan email yang dikirimkan dalam request
            ->replyTo($this->data['email'], $this->data['name'] . ' - Customer');
    }
}
