<?php

interface INotifier
{
	public function send();
}

class Notifier implements INotifier
{
	private $message;

	public function __construct(string $message) {
		$this->message = $message;
	}

	public function send() {
		echo 'Сообщение ' . $this->message . ' отправлено на email<br>' . PHP_EOL;
		return $this->message;
	}
}

abstract class Decorator implements INotifier
{
	protected $notifier = null;

	public function __construct(INotifier $notifier)
	{
		$this->notifier = $notifier;
	}
}

class TelegramNotifier extends Decorator {
	public function send() {
		$message = $this->notifier->send();	
		echo 'Сообщение ' . $message . ' отправлено в Telegram<br>' . PHP_EOL;
	}
}
class VkNotifier extends Decorator {
	public function send() {
		$message = $this->notifier->send();
		echo 'Сообщение '. $message . ' отправлено в Vk<br>' . PHP_EOL;
	}
}


header('Content-Type: text/html; charset=utf-8');

$notifier = new Notifier("Привет");

$decorator1 = new TelegramNotifier($notifier);
$decorator2 = new VkNotifier($decorator1);
$decorator2->send();