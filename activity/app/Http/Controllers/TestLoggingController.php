<?php

namespace App\Http\Controllers;

use App\Services\Utility\ILoggerService;
use Illuminate\Http\Request;

class TestLoggingController extends Controller
{
    protected $logger;

    public function __construct(ILoggerService $logService){
        $this->logger = $logService;
    }

    public function index() {
        $this->logger->info("Entered test logging controller index", ['']);
    }
}
