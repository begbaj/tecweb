<?php

namespace App\Console\Commands;

use App\Models\Resources\Alloggio;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class genImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kumu:genImgs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Grab random images for every flat in the database';

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
        $alloggi = Alloggio::all();
        foreach($alloggi as $alloggio){
            $allId = $alloggio->id;
            $num = rand(3,10);
            $alldir = public_path('assets/'.(string)$allId);
            if ( !file_exists( $alldir ) && !is_dir( $alldir ) ) {
                mkdir($alldir, 0775); 
            } 
            /* old method, download images from loremflickr
                echo 'downloading images for ' . $alldir . '\n';
                for ($i = 0; $i < $num; $i++) {
                    file_put_contents($alldir.'/thumbnail', file_get_contents('https://loremflickr.com/320/240/house,home'));
                }
             */
            echo 'moving images for ' . $alldir . "\n";
            $stocks = public_path('img/stock-images/*');
            $file = glob($stocks);
            shuffle($file);
            for ($i = 0; $i < $num; $i++) {
                copy($file[0], $alldir . "/thumbnail");
            }
        }
    }
}
