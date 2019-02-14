<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CronModel extends Model
{
    public $table = 'crons';


    protected $primaryKey = 'command';
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['command', 'next_run', 'last_run'];




    /**
     * This determines if this command should be run by myself.
     * @return bool
     */
    public static function shouldIRun($command, $minutes) {
        $cron = Cron::find($command);
        $now  = Carbon::now();
        if ($cron && $cron->next_run > $now->timestamp) {
            return false;
        }
        Cron::updateOrCreate(
            ['command'  => $command],
            ['next_run' => Carbon::now()->addMinutes($minutes)->timestamp,
             'last_run' => Carbon::now()->timestamp]
        );
        return true;
}
}
