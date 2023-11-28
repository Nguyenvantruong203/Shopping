<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // $validator = Validator::make($request->all(),[
        //     'username' => 'required|unique:users, username',
        //     'password'=> 'required',
        //     'email'=> 'required|email',
        //     'name'=> 'required',
        // ],
        // [
        //     'username.required'=> 'Nhập tên tài khoản',
        //     'username.unique'=> 'Tên tài khoản đã tồn tại',
        //     'password.required'=> 'Nhập mật khẩu',
        //     'email.required'=> 'Nhập Email',
        //     'email.email'=> 'Email không hợp lệ',
        //     'name.required'=> 'Nhập họ và tên',
        // ]);
        // if($validator->fails()){
        //     $response = [
        //         'success' => false,
        //         'message' => $validator->errors()
        //     ];
        //     return response()->json($response, 400);
        // }
        // $input = $request->all();
        // $input['password'] = bcrypt($input['password']);
        // $user = User::create($input);

        // $success['token'] = $user->createToken('MyApp')->plainTextToken;
        // $success['token'] = $user->name;

        // $response = [
        //     'success' => true,
        //     'data' => $success,
        //     'message' => 'user register successfully'
        // ];
        // return response()->json($response, 200);


        //true
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|string|min:8',

        // ], [
        //     'name.required' => 'Yêu cầu nhập tên.',
        //     'email.required' => 'Yêu cầu nhập email.',
        //     'email.email' => 'Định dạng email không hợp lệ.',
        //     'email.unique' => 'Email đã được sử dụng.',
        //     'password.required' => 'Yêu cầu nhập mật khẩu.',
        //     'password.string' => 'Mật khẩu phải là một chuỗi.',
        //     'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',

        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // $success['token'] = $user->createToken('MyApp')->plainTextToken;

        // $response = [
        //     'success' => true,
        //     'data' => $success,
        //     'message' => 'user register successfully'
        // ];
        // return response()->json($response, 200);


        $input = $request->all();
        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),

        ]);
      return response()->json(["status" => true,
    "message"=>"User created Successfully"],201);
    }
    // public function login(Request $request){
    //     if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
    //         $user = Auth::user();
    //         $success['token'] = $user->createToken('MyApp')->plainTextToken;

    //         // Lỗi ở đây, bạn ghi đè giá trị token bằng $user->name
    //         $success['token'] = $user->name;

    //         $response = [
    //             'success' => true,
    //             'data' => $success,
    //             'message' => 'user login successfully'
    //         ];
    //         return response()->json($response, 200);
    //     }else{
    //         $response = [
    //             'success' => false,
    //             'message' => 'Unauthorised'
    //         ];
    //         return response()->json($response);

    //     }
    // }
    public function login(Request $request){
        // if(Auth::attempt(['email'=> $request->email,'password'=> $request->password])){
        //     $user = Auth::user();
        //     $success['token'] = $user->createToken('MyApp')->plainTextToken;


        //     $response = [
        //         'success' => true,
        //         'data' => $success,
        //         'message' => 'User login seccessfully'
        //     ];
        //     return response()->json($response, 200);
        // }else{
        //     $response = [
        //         'success' => false,
        //         'message' => 'Unauthorised'
        //     ];
        //     return response()->json($response);
        // }

        $credentials = $request->validate([
            'password' => 'required',
            'email' => 'required|email',
        ]);

        if (Auth::attempt($credentials)) {
            return response()->json([
                "status" => true,
                "message" => "User logged in successfully"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Invalid credentials"
            ], 401);
        }
    }



    // public function login(Request $request)
    // {
    //     $user = User::where('email', $request->email)->first();

    //     if (!$user || !Hash::check($request->password, $user->password, [])) {
    //         return response()->json([
    //             "message" => "user not exist"
    //         ], 404);
    //     }
    //     $token = $user->createToken('authToken')->plainTextToken;

    //     return response()->json([
    //         "access_token" => $token,
    //         "type_token" => "Bearer",
    //         $request

    //     ], 200);

    // }

}
