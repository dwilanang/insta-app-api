<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Laravel Insta App API",
 *      description="API documentation for Insta-App with Laravel",
 *      @OA\Contact(
 *          email="dev@example.com"
 *      ),
 *      @OA\License(
 *          name="MIT",
 *          url="https://opensource.org/licenses/MIT"
 *      )
 * )
 * 
 * @OA\SecurityScheme(
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="sanctum"
 * )
 * 
 * @OA\Schema(
 *     schema="StandardResponse",
 *     type="object",
 *     @OA\Property(property="status", type="boolean", example=true),
 *     @OA\Property(property="message", type="string", example="Success"),
 *     @OA\Property(property="data", type="object")
 * )
 * 
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="John Doe"),
 *     @OA\Property(property="email", type="string", example="john@example.com"),
 *     @OA\Property(property="created_at", type="string", format="date-time")
 * )
 * 
 * @OA\Schema(
 *     schema="AuthToken",
 *     type="object",
 *     @OA\Property(property="token", type="string", example="1|sometokenstring"),
 *     @OA\Property(property="user", ref="#/components/schemas/User")
 * )
 * 
 * @OA\Schema(
 *     schema="PostItem",
 *     type="object",
 *     @OA\Property(property="caption", type="string", example="Liburan di Bali"),
 *     @OA\Property(property="image", type="string", example="post_images/abc123.jpg"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="user", type="object",
 *         @OA\Property(property="name", type="string", example="John Doe")
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="StandardResponseWithUser",
 *     type="object",
 *     @OA\Property(property="status", type="boolean", example=true),
 *     @OA\Property(property="message", type="string", example="Login successful"),
 *     @OA\Property(property="data", ref="#/components/schemas/User")
 * )
 * 
 * @OA\Schema(
 *     schema="StandardResponseWithToken",
 *     type="object",
 *     @OA\Property(property="status", type="boolean", example=true),
 *     @OA\Property(property="message", type="string", example="Login success"),
 *     @OA\Property(property="data", ref="#/components/schemas/AuthToken")
 * )
 * 
 * @OA\Schema(
 *     schema="StandardResponseWithPosts",
 *     type="object",
 *     @OA\Property(property="status", type="boolean", example=true),
 *     @OA\Property(property="message", type="string", example="Posts retrieved"),
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/PostItem")
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="UserSimple",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Dwi Project")
 * )
 * 
 * @OA\Schema(
 *     schema="CommentItem",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="body", type="string", example="Ini komentar pertama"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="user", ref="#/components/schemas/UserSimple")
 * )
 * 
 * @OA\Schema(
 *     schema="ErrorResponse",
 *     type="object",
 *     @OA\Property(property="status", type="boolean", example=false),
 *     @OA\Property(property="message", type="string", example="Unauthorized")
 * )
 */
abstract class Controller
{
    //
}
