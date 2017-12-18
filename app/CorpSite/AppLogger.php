<?php
/**
 * Логгер приложения
 */

namespace Nova\CorpSite;

use Monolog\Logger;
use Monolog\Registry;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\WebProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Processor\IntrospectionProcessor;
use Monolog\Processor\MemoryPeakUsageProcessor;
use Monolog\Processor\ProcessIdProcessor;

/**
 * Class AppLogger
 *
 * @package Nova\CorpSite\Logger
 */
class AppLogger
{
    /**
     * Название общего лога приложения
     */
    const GENERAL_APP_LOG_NAME = 'app.main';

    const APP_NAME = 'NOVA';

    /**
     * Создает логгер c указанным именем.
     *
     * @param string $name Имя логгера
     *
     * @return \Monolog\Logger Логгер
     * @throws \Exception
     * @throws \InvalidArgumentException
     *
     */
    public static function getLogger($name): \Monolog\Logger
    {
        if (!Registry::hasLogger($name)) {
            //Формат записи даты в лог
            $dateFormat = 'Y-m-d H:i:s';

            //Формат записи в лог
            $output = "[%datetime%][%channel%][%level_name%]: %message% %context% %extra%\n";

            //Форматер строк логов
            $formatter = new LineFormatter($output, $dateFormat);

            $logger = new Logger($name);

            //Общий логгер для сайта
            self::addStreamHandler($logger, $formatter, self::GENERAL_APP_LOG_NAME);
            //Логгер с заданным названием
            self::addStreamHandler($logger, $formatter, $name);

            //Процессоры логгирования
            $logger->pushProcessor(new ProcessIdProcessor);
            $logger->pushProcessor(new MemoryUsageProcessor);
            $logger->pushProcessor(new MemoryPeakUsageProcessor);
            $logger->pushProcessor(new WebProcessor);
            $logger->pushProcessor(new IntrospectionProcessor());

            Registry::addLogger($logger);
        }

        return Registry::$name();
    }

    /**
     * Добавить стрим хендлеры для заданного имени
     *
     * @param Logger        $logger    Логгер
     * @param LineFormatter $formatter Форматтер заисей в лог
     * @param string        $name      Название логгера
     *
     * @return bool
     * @throws \Exception
     *
     */
    private static function addStreamHandler(Logger $logger, LineFormatter $formatter, $name): bool
    {
        $path = self::getLogPath();
        $level = self::getLoggerLevel();
        $stream = new StreamHandler($path . '/' . $name . '.log', $level);
        $stream->setFormatter($formatter);
        $logger->pushHandler($stream);

        return true;
    }

    /**
     * Получить путь к папке с логами приложения из настроек модуля
     *
     * @return string
     */
    private static function getLogPath(): string
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/storage/logs/'; //todo получить из настроек
    }

    /**
     * Получить режим логгирования из настроек модуля
     *
     * @return int
     *
     */
    private static function getLoggerLevel(): int
    {
        return Logger::DEBUG;
    }
}
