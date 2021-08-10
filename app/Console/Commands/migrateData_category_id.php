<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use App\Models\Article_Category;

class migrateData_category_id extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transfert:DataCat_id';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $articles=Article::all();
        $tab = [];
      
       
        foreach ($articles as $article) {
            $tab[] = empty($article->category_id) === true || $article->category_id === 0 ? 1 : $article->category_id;
        }
 
        $article->categories()->sync($tab);

        

       
    }
}
