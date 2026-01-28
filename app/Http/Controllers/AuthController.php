<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Hiển thị form đăng ký SignIn
     */
    public function SignIn()
    {
        return view('auth.signin');
    }

    /**
     * Kiểm tra dữ liệu đăng ký từ form
     */
    public function CheckSignIn(Request $request)
    {
        // Lấy dữ liệu từ form
        $username = $request->input('username');
        $password = $request->input('password');
        $repass = $request->input('repass');
        $mssv = $request->input('mssv');
        $lopmonhoc = $request->input('lopmonhoc');
        $gioitinh = $request->input('gioitinh');

        // Kiểm tra password và repass có khớp không
        if ($password != $repass) {
            return "Đăng ký thất bại";
        }

        // Kiểm tra thông tin sinh viên làm bài (theo ví dụ: namlt, 123abc, 123abc, 26867, 67PM1, nam)
        $validUsername = 'namlt';
        $validPassword = '123abc';
        $validMssv = '26867';
        $validLopmonhoc = '67PM1';
        $validGioitinh = 'nam';

        // Kiểm tra từng trường thông tin
        if ($username == $validUsername && 
            $password == $validPassword && 
            $mssv == $validMssv && 
            $lopmonhoc == $validLopmonhoc && 
            $gioitinh == $validGioitinh) {
            return "Đăng ký thành công!";
        }

        // Nếu thông tin không khớp
        return "Đăng ký thất bại";
    }
}

