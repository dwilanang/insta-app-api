<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class LikeController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/v1/posts/{post}/like",
     *     summary="Like atau Unlike sebuah post",
     *     tags={"Likes"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="post",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Berhasil like/unlike post",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Liked/Unliked")
     *         )
     *     )
     * )
     */
    public function index(Post $post)
    {
        $user = auth()->user();

        $like = $post->likes()->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
            return response()->json(['message' => 'Unliked']);
        } else {
            $post->likes()->create(['user_id' => $user->id]);
            return response()->json(['message' => 'Liked']);
        }
    }
}
