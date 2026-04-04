<?php

namespace Eduardokum\LaravelBoleto\Boleto;

use Exception;
use Illuminate\Mail\Mailer;
use Illuminate\Foundation\Application;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;

class LaravelBoletoMailer extends Mailer
{
    private const EMBED_IMAGES_CONTRACT = 'Eduardokum\\LaravelMailAutoEmbed\\Contracts\\Listeners\\EmbedImages';
    private const SYMFONY_EMBED_IMAGES_LISTENER = 'Eduardokum\\LaravelMailAutoEmbed\\Listeners\\SymfonyEmbedImages';

    /**
     * @param $message
     * @param $data
     * @return bool
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function shouldSendMessage($message, $data = [])
    {
        $embedImagesContract = self::EMBED_IMAGES_CONTRACT;
        $symfonyEmbedImagesListener = self::SYMFONY_EMBED_IMAGES_LISTENER;
        $embedIsBound = class_exists($embedImagesContract) && app()->bound($embedImagesContract);

        if (self::isLaravel9Plus() && ! $embedIsBound && class_exists($symfonyEmbedImagesListener)) {
            try {
                (new $symfonyEmbedImagesListener(config()->get('mail-auto-embed')))->handle($message);
            } catch (Exception $e) {
            }
        }

        return parent::shouldSendMessage($message, $data);
    }

    /**
     * @return bool|int
     */
    public static function isLaravel9Plus()
    {
        return version_compare(Application::VERSION, '9.0.0', '>=');
    }
}
