<?php

namespace OBS\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use OBS\Http\Requests\Request;

class RequestLogs
{
    private $log = null;
    private $render_log = null;
    private $started_at = null;

    public function __construct()
    {
        $this->log = new Logger('requests');
        $this->log->pushHandler(new StreamHandler(storage_path('logs/requests.log'), Logger::INFO));

        $this->render_log = new Logger('rendering');
        $this->render_log->pushHandler(new StreamHandler(storage_path('logs/rendering.log'), Logger::INFO));
        $this->started_at = microtime(true);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    /**
     * @param Request $request
     * @param Response $response
     */
    public function terminate($request, $response) {
        $this->log->info('app.requests', [
            'request' => [
                'path'      => $request->path(),
                'method'    => $request->method(),
                'headers'   => $request->header(),
                'params'    => $request->all(),
            ],
            'response' => [
                'headers' => $response->headers,
                'content' => $response->getContent(),
            ],
        ]);

        $sent_at = microtime(true);
        $this->render_log->info(sprintf('[%s] %s', $request->method(), $request->path()), [
            'time'      => ($sent_at - $this->started_at) * 1000 . 'ms',
            'start'     => $this->started_at,
            'end'       => $sent_at,
        ]);
    }
}