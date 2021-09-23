<?php

namespace App\Events;

use App\Models\Mahasiswa;
use Illuminate\Support\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DataManipulation implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $data_mahasiswa;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
        
        $this->data_mahasiswa = '';
        foreach (Mahasiswa::orderBy('name', 'asc')->cursor() as $key => $mahasiswa) {
            $this->data_mahasiswa .= '<tr>
            <td class="p-4 text-left">'.($key + 1).'</td>
            <td class="p-4 text-left">'.$mahasiswa->nim.'</td>
            <td class="p-4 text-left">'.$mahasiswa->name.'</td>
            <td class="p-4 text-left">'.$mahasiswa->email.'</td>
            <td class="p-4 text-left">'.$mahasiswa->gender.'</td>
            <td class="p-4 text-left">'.Carbon::parse($mahasiswa->birth)->format('d M Y').'</td>
            <td class="p-4 text-left flex">
                <a href="'.route('edit', $mahasiswa->id).'" class="mr-2 px-3 py-1 transition bg-green-500 hover:bg-green-700 rounded text-white">
                    Edit
                </a>
                <form action="'.route('delete', $mahasiswa->id).'" method="POST" class="flex">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="ml-2 px-3 py-1 transition bg-red-500 hover:bg-red-700 rounded text-white" onclick="deleteMahasiswa(this)">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>';
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['manipulation-data'];
    } 
}
