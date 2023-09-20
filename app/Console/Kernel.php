<?php

namespace App\Console;

use App\Models\ChatMessage;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;





class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->call(function () {
            $expire = Post::whereIn('post_boaster', ['superhot', 'hot'])
                ->where('updated_at', '<=', Carbon::now()->subDays(30))
                ->get();
            foreach ($expire as $normal) {
                $normal->post_boaster = 'normal';
                $normal->save();
            }

            Log::info("post booster status updated");
        })->daily();

        $schedule->call(function () {

            $posts = Post::all();

            $postsIDForDelete = [];

            $now = Carbon::now();

            foreach ($posts as $post) {
                $createdAtParse = Carbon::parse($post->created_at);

                if ($createdAtParse->diff($now)->d == 2 && $post->sold == 1) {

                    array_push($postsIDForDelete, $post->id);

                    ///// ////////////////////storing data into json file//////////////////////////////
                    $jsonData = Storage::disk("public_main")->get("json/data.json");
                    $phpObj = json_decode($jsonData, true);
                    $phpObj["allSoldPostNum"] = $phpObj["allSoldPostNum"] + 1;
                    $jsonObj = json_encode($phpObj);
                    Storage::disk("public_main")->put("json/data.json", $jsonObj);
                }
            }

            if (!empty($postsIDForDelete)) {

                ///deleting post which was added in postsIDForDelete Array
                $postToDelete = Post::whereIn("id", $postsIDForDelete)->delete();
            }

            Log::info("sold post deleted command run succesfully");
        })->cron(" 34 3 * * 1,5,6 ")->timezone("Asia/Karachi"); //minute//hour//date//month//weekday//



        //////------------ delete messages from message tabel------- //////////
        $schedule->call(function () {
            $messages = ChatMessage::where("sender_status", "deleted")
                ->where("reciver_status", "deleted")
                ->get();

            foreach ($messages as $message) {
                $message->delete();
            }

            Log::info("message deletion command run succesfully");
        })->cron(" 34 3 * * 1,5,6 ")->timezone("Asia/Karachi");;
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
