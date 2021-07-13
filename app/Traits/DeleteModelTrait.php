<?php

namespace App\Traits;

use Exception;

trait DeleteModelTrait
{
    public function deleteModel($id, $instance)
    {
        try {
            $instance->findOrFail($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Deleted successfully'
            ], 200);
        } catch (Exception $e) {
            \Log::error('Messenger: ' . $e->getMessage() . '. Line: ' . $e->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}
