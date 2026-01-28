<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Lấy tuổi từ session
        $age = session('age');
        
        // Kiểm tra nếu tuổi không tồn tại trong session
        if ($age === null) {
            return response("Không được phép truy cập", 403);
        }
        
        // Kiểm tra nếu tuổi không phải là số
        if (!is_numeric($age)) {
            return response("Không được phép truy cập", 403);
        }
        
        // Chuyển đổi sang số nguyên để so sánh
        $age = (int) $age;
        
        // Kiểm tra nếu tuổi < 18
        if ($age < 18) {
            return response("Không được phép truy cập", 403);
        }
        
        // Nếu tuổi >= 18, cho phép tiếp tục
        return $next($request);
    }
}

