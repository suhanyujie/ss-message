<?php

namespace App\Console\Commands\Message;

use App\Services\Workerman\WebsocketService;
use Illuminate\Console\Command;

class Websocket extends Command
{
    protected $service;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ss:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Chat 服务启动';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->service = new WebsocketService(
            "0.0.0.0",
            3001
        );
    }
}
