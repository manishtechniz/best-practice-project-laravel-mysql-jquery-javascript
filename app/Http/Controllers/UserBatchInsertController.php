<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Batch;
use Throwable;

use App\Jobs\InsertUserRecord;

class UserBatchInsertController extends Controller
{
    public function store()
    {
        $batch = Bus::batch([
            new InsertUserRecord(100),
            new InsertUserRecord(100),
            new InsertUserRecord(100),
            new InsertUserRecord(100),
            new InsertUserRecord(100),
            new InsertUserRecord(100),
            new InsertUserRecord(100),
            new InsertUserRecord(100),
            new InsertUserRecord(100),
            new InsertUserRecord(100),
        ])->name('Insert records for user')->dispatch();

        return redirect()
            ->route('batch_progress_ui', ['id' => $batch->id]);
    }

    public function batchProgressUI($id)
    {
        return view('batch-progress-ui', [
            'batch_id' => $id,
        ]);
    }
    
    public function batchProgress($id)
    {
        $batch = Bus::findBatch($id);
 
        if(empty($batch)) {
            return response()->json([
                'message' => 'Batch not found',
            ], 404);
        }

        return response()->json([
            'data' => $batch,
        ]);
    }
}
