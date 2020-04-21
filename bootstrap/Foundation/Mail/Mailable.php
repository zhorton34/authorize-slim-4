<?php


namespace Boot\Foundation\Mail;

use Jenssegers\Blade\Blade;
use Swift_Mailer as Mailer;
use Swift_Message as Email;

class Mailable
{
    protected $view;
    protected $email;
    protected $mailer;

    public function __construct(Mailer $mailer, Email $email, Blade $view)
    {
        $this->view = $view;
        $this->email = $email;
        $this->mailer = $mailer;
    }

    public function subject(string $subject)
    {
        $this->email->setSubject($subject);

        return $this;
    }

    public function from($address, $name = '')
    {
        $this->email->setFrom([$address => $name]);

        return $this;
    }

    public function to($address, $name = '')
    {
        $this->email->setTo([$address => $name]);

        return $this;
    }
    public function description($description)
    {
        $this->email->setDescription($description);

        return $this;
    }

    public function view($path, $with)
    {
        $template = $this->view->make($path, $with)->render();

        $this->email->setBody($template, 'text/html');

        return $this;
    }

    public function send()
    {
        return $this->mailer->send($this->email);
    }
}
