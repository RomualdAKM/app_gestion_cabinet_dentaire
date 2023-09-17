<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DeviMail extends Mailable
{
    use Queueable, SerializesModels;

    public $devi;
    public $item_devis;
    public $client;
    public $pdfData;
    public $pdfFileName;

    public function __construct($devi,$client, $item_devis, $pdfData, $pdfFileName)
    {
        $this->devi = $devi;
        $this->client = $client;
        $this->item_devis = $item_devis;
        $this->pdfData = $pdfData;
        $this->pdfFileName = $pdfFileName;
    }

    public function build()
    {
        return $this->subject('devi Mail')
                    ->view('devis.download')
                    ->attachData($this->pdfData, $this->pdfFileName, ['mime' => 'application/pdf']);
    }
}
