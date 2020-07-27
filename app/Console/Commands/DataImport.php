<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// use simplehtmldom\HtmlWeb;
use simplehtmldom\HtmlDocument;
use App\Municipality;

class DataImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import date';

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
     * @return int
     */
    public function handle()
    {
        // $this->info('Data import start');
        $max = config('dataimport.max_items');

        $bar = $this->output->createProgressBar($max);

        for ( $i = 1; $i <= $max; $i++) {
            if (!$this->importMunicipality($i)){
                $this->info(PHP_EOL . 'Items imported:' . ($i - 1) . PHP_EOL);
                break; //no more data
            }

            $bar->advance();

            if ($i == $max)
            {
                $this->info(PHP_EOL . 'Impot data limit reached. Items imported:' . $i . PHP_EOL);
            }
        }
        
        //$bar->finish();
        
        return 0;
    }

    private function importMunicipality($id) 
    {
        //using custom load funtion to fix encoding issues
        $url = config('dataimport.source_url');
        $url = 'http://127.0.0.1:8000/dummy_data/edit/%d';
        $url = sprintf($url, $id);

        $html = $this->load_curl($url);

        $form = $html->find('form[name="uprav"]', 0);

        $municipality = Municipality::firstOrNew(['external_id' => $id]);

        //external_id
        $municipality->external_id = $id;
        // name
        $municipality->name = $form->find('b',0)->innertext;
        // mayor
        $municipality->mayor = $form->find('input[id="Starosta"]',0)->value;
        // address
        $municipality->address_streetName = $form->find('input[id="Ulica"]',0)->value;
        $municipality->address_buildingNumber = $form->find('input[id="Cislo"]',0)->value;
        $municipality->address_postcode = $form->find('input[id="Psc"]',0)->value;
        $municipality->address_city = $form->find('input[id="Posta"]',0)->value;
        // phone
        $municipality->phone_prefix = $form->find('input[id="SmeroveCislo"]',0)->value;
        $municipality->phone = $form->find('input[id="Telefon"]',0)->value;
        // fax
        $municipality->fax = $form->find('input[id="Fax"]',0)->value;
        // email
        $municipality->email = $form->find('input[id="Email"]',0)->value;
        // web
        $municipality->web = $form->find('input[id="URL"]',0)->value;
        // img
        // geo

        if($municipality->name != '')
        {
            $municipality->save();  
            return true;          
        } else {
            return false; // no more data
        }
    }

    private function load_curl($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $doc = curl_exec($ch);

        curl_close($ch);

        //fix encoding issue
        $doc = iconv("windows-1250", "UTF-8//IGNORE", $doc);
        
        return new HtmlDocument($doc);
    }

}
