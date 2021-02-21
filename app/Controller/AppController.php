<?php
/**
 * Copyright (c) 2020 Wakers.cz
 * @author Jiří Zapletal (https://www.wakers.cz, zapletal@wakers.cz)
 */
declare(strict_types=1);

namespace Strategio\Controller;

use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class AppController extends AbstractController implements IController
{
    /**
     * @param string $template
     * @return Response
     */
    public function index(string $template) : Response
    {
        $file = __DIR__ . "/../template/presenter/{$template}.latte";

        $this->latteParams['persons'] = [
            ['name' => 'CEO, Jiří Zapletal', 'phone' => '+420 606 091 125', 'email' => 'jz@strategio.digital', 'photo' => 'zapletal-sm-white.png']
        ];

        if (file_exists($file)) {
            $html = $this->latteEngine->renderToString($file, $this->latteParams);
        } else {
            $html = $this->latteEngine->renderToString(__DIR__ . "/../template/presenter/error.latte", $this->latteParams);
        }

        $response = new Response($html);
        return $response->sendContent();
    }

    /**
     * @return JsonResponse
     */
    public function contactForm() : JsonResponse
    {
        if ($this->request->get('token') !== 'šest' && $this->request->get('token') !== 'oztgfvbnmkjh@rtzuiolkh2494#QEr') {
            return (new JsonResponse(['error' => 'Vyčkejte prosím 10 vteřin a odešlete formulář znovu. Tímto se bráníme proti spamu, děkujeme za pochopení.']))->send();
        }

        $body =  [
            'Kontakt: ' => $this->request->get('contact'),
            'IP Adresa: ' => $this->request->getClientIp(),
            'Datum odeslání: ' => (new \DateTime)->format('j.n.Y H:i:s')
        ];

        $body = array_map(function ($key, $value) { return $key . $value; }, array_keys($body), $body);

        $message = (new Message)
            ->setFrom('zwebu@wakers.cz', 'Web strategio.digital')
            ->addTo('get@strategio.digital')
            ->setSubject('Zpráva z webu strategio.digital')
            ->setBody("Dobrý den,\r\nprávě byla odeslána zpráva z Vašeho webu.\r\n\r\n" . implode("\r\n", $body));

        $mailer = new SmtpMailer([
            'host' => $_ENV['SMTP_HOST'],
            'username' => $_ENV['SMTP_USERNAME'],
            'password' => $_ENV['SMTP_PASSWORD'],
            'secure' => $_ENV['SMTP_SECURE']
        ]);

        try {
            $mailer->send($message);
            $data = ['success' => '<b>Váš kontakt byl úspěšně odeslán, děkujeme!</b> Do 30 minut se Vám ozveme na uvedený telefon nebo e-mail.'];
        } catch (\Exception $exception) {
            $data = ['error' => 'Odeslání selhalo, prosím kontaktujte nás jiným způsobem. Děkujeme za pochopení.' . $exception->getMessage()];
        }

        $jsonResponse = new JsonResponse($data);
        return $jsonResponse->send();
    }
}
