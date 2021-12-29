<?php

namespace App\Observers;
use \SplObserver;
use \SplSubject;

class LogSum implements SplObserver
{
    private string $filename;
    private string $directory;

    public function __construct(string $filename, string $directory)
    {
        $this->filename = $filename;
        $this->directory = $directory;
    }
    // file name ; file directory
    public function update( SplSubject $subject) {
        file_put_contents($this->directory . $this->filename, $subject->total());
    }
}