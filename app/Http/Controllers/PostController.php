<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PostController extends Controller
{
    public function index()
    {
        try {
            $post = Post::all();
        } catch (Exception $e) {
            return response()->json([
                'data' => [],
                'message'=>$e->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
        return response()->json([
            'data' => $post,
            'message' => 'Succeed'
        ], JsonResponse::HTTP_OK);
    }

    function show($id){
        try {
            $post = Post::findOrFail($id);
            return response()->json([
                'data' => $post,
                'message' => 'Succeed',
            ], JsonResponse::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'data' => [],
                'message'=>$e->getMessage()
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }

    function help() {
        return view('help');
    }
}
