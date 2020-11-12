<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class KeyGenerateCommand extends Command
{
    // 命令名
    protected $name = 'key:generate';
    // 描述
    protected $description = "Set the application key";
    // 執行
    public function handle() {
        $key = $this->getRandomKey();
        if ($this->option('show')){
            $this->line('<command>'.$key.'</command>');
            return;
        }
        $path = base_path('.env');
        if (file_exists($path)){
            file_put_contents($path, str_replace('APP_KEY='.env('APP_KEY'), 'APP_KEY='.$key, file_get_contents($path)));
        }
        $this->info("Application key [$key] set successfully.");
    }

    /**
     * @return string
     * 獲取隨機32key
     */
    protected function getRandomKey(){
        return Str::random(32);
    }

    protected function getOptions()
    {
        return [
            ['show', null, InputOption::VALUE_NONE, 'Simply display the key instead of modifying files.']
        ];
    }
}
