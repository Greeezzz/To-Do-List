<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class TaskList extends Component
{
    use LivewireAlert;
    public $kegiatan;
    public $kegiatan_id;

    public function tambahKegiatan()
    {
        $this->validate([
            'kegiatan' => 'required',
        ]);

        $simpan = new Task();
        $simpan -> kegiatan = $this->kegiatan;
        $simpan -> status = 'Belum';
        $simpan->user_id = auth()->user()->id;
        $simpan->save();
        $this->alert('success', 'Succes !', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'text' => 'Anda berhasil menambahkan kegiatan',
            'showConfirmButton' => true,
            'onConfirmed' => '',
           ]);
        $this->kegiatan = '';
    }

    public function hapusTask($id)
    {
        Task::find($id)->delete();
        $this->alert('error', 'Succes !', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'showCancelButton' => false,
            'onDismissed' => '',
            'text' => 'Task berhasil di hapus',
            'confirmButtonText' => 'Oke',
           ]);
    }

    public function editTask($id){
        $task = Task::find($id);
        if ($task) {
            $this->kegiatan_id = $task->id;
            $this->kegiatan = $task->kegiatan;
        }
    }

    public function editKegiatan(){
        $this->validate([
            'kegiatan' => 'required',
        ]);
    
        $task = Task::find($this->kegiatan_id);
        if ($task) {
            $task->kegiatan = $this->kegiatan;
            $task->save();
            
            $this->alert('success', 'Succes !', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'showConfirmButton' => true,
                'onConfirmed' => '',
                'showCancelButton' => false,
                'onDismissed' => '',
                'text' => 'Task Berhasil di edit',
                'confirmButtonText' => 'Oke',
            ]);
            
            $this->reset(['kegiatan','kegiatan_id']);
        }
    }
    
    public function updateStatus($id, $ket){
        $status = Task::find($id);
        $status->status = $ket;
        $this->alert('warning', 'Succes !', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'showCancelButton' => false,
            'onDismissed' => '',
            'text' => 'Anda Berhasil mengganti Status',
            'confirmButtonText' => 'Oke',
           ]);
        $status->save();
    }

    public function render()
    {
        return view('livewire.task-list')->with([
            'task' => Task::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
