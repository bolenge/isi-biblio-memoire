<?php
    namespace Core;

    class Mail {

        public static function send(array $content)
        {
            if (empty($content) || !is_array($content)) {
                throw new Exception("Le content doit être un tableau : ['receivers' => [], 'subject' => string, 'content' =>text]");
            }

            $transport = (new \Swift_SmtpTransport(config('mail.MAIL_HOST'), config('mail.MAIL_PORT')))
                ->setUsername(config('mail.MAIL_USERNAME'))
                ->setPassword(config('mail.MAIL_PASSWORD'));

            $mailer = new \Swift_Mailer($transport);

            // Create a message
            $message = (new \Swift_Message($content['subject']))
                ->setFrom([config('mail.MAIL_USERNAME') => config('mail.MAIL_FROM_NAME')])
                ->setTo($content['receivers'])
                ->setBody($content['content']);
            $message->setContentType("text/html");

            // Send the message
            $result = $mailer->send($message);
            return $result;
        }
    }