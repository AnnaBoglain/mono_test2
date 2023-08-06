<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OutputCommentCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:output-comment-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создание фаила и вывод в него отзывов по данным условиям.';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $feedbacks = DB::table('feedback')
            ->leftJoin('users', 'users.id', '=','feedback.user_id')
            ->leftJoin('ratings', 'feedback.id', '=','ratings.feedback_id')
            ->leftJoin('products', 'products.id', '=','feedback.product_id')
            ->whereRaw('users.city = "Самара" or users.city = "Волгоград"')
            ->where(function () {
                DB::table('feedback')->select('value')
                    ->where('value', '>', '10')
                    ->orWhere(function () {
                        DB::table('feedback')->select('user_id')->havingRaw('COUNT(user_id) > 10')
                            ->whereRaw('AVG(ratings.estimation) > 4')
                            ->where( 'products.price', '>', '3000');
                    });})
            ->groupBy('feedback.id')->pluck('text');

        Storage::disk('local')->put('test.csv', 'Комментарии:');
        foreach ($feedbacks as $feedback) {
            Storage::append('test.csv', $feedback);
        }
    }
}
